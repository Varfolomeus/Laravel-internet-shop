<?php
namespace App\Classes;
use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Basket
{
    protected $order;

    /**
     * Basket constructor.
     * @param bool $createOrder
     */
    public function __construct($createOrder = false)
    {
        $orderId = session('orderId');
        if (is_null($orderId) && $createOrder) {
            $data = [];
            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }
            $this->order = Order::create($data);
            session(['orderId' => $this->order->id]);
        } else {
            $this->order = Order::findOrFail($orderId);
        }
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }
    public function saveOrder($name, $phone, $email)
    {
        // dd('saveorder',$this, $name, $phone);
        Mail::to($email)->send(new OrderCreated($name, $this));
        return $this->order->saveOrder($name, $phone, $email);
    }
    public function countAvailable($updateCount = false)
    {
        $warningText = 'Увага: ';
        $warnNumber = 1;
        $payAttention = false;
        foreach ($this->order->products as $orderProduct) {
            $ordered = $this->getPivotRow($orderProduct)->count;
            $warehouseRest = $orderProduct->count;

            if ($warehouseRest < $ordered) {
                $payAttention = true;
                $warningText = $warningText . $warnNumber . '.- Кількість ' . $orderProduct->name . ', на складі - ' . $warehouseRest . ', не відповідає замовленню - ' . $ordered . '. Замовте меншу кількість та (або) запитайте у служби підтримки про дату найближчого поповнення складу, щоб дозамовити другу поставку або замовити однією поставкою бажану кількість. ';
                $warnNumber++;
            }
        }

        if ($payAttention) {
            session()->flash('warning', $warningText);
            return false;
        } else {
            if ($updateCount) {
                foreach ($this->order->products as $orderProduct) {
                    $orderProduct->count -= $this->getPivotRow($orderProduct)->count;
                    $orderProduct->save();
                }
            }
            return true;
        }
    }

    protected function getPivotRow($product)
    {
        return $this->order
            ->products()
            ->where('product_id', $product->id)
            ->first()->pivot;
    }
    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivotRow($product);
            $pivotRow->count++;
            if ($pivotRow->count > $product->count && $product->count > 0) {
                session()->flash('warning', 'Кількість товару що ви замовляєте: ' . $product->name . ' дорівнює залишку на складі! Дізнайтесь у служби підтримки про дату найближчого поповнення складу.');
                return false;
            }
            $pivotRow->update();
            session()->flash('success', 'Кількість товару: ' . $product->name . ' збільшено на 1. Дакуємо за довіру!');
        } else {
            if ($product->count == 0) {
                session()->flash('warning', 'Замовленого товару: ' . $product->name . ' немає на складі! Дізнайтесь у служби підтримки про дату найближчого поповнення складу.');
                return false;
            }
            $this->order->products()->attach($product->id);
            session()->flash('success', 'До переліку покупок додано товар: ' . $product->name);
            return true;
        }
    }
    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivotRow($product);
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($product->id);
                session()->flash('warning', 'Товар: ' . $product->name . ' видалено з кошика.');
            } else {
                $pivotRow->count--;
                session()->flash('warning', 'Кількість товару: ' . $product->name . ' зменшено на 1.');
                $pivotRow->update();
            }
        }
    }
}
