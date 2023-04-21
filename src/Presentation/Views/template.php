<?php
/**
 * @var array $products
 *  @var array $deliveries
 *  @var array $addresses
 * @var \Delivery\Domain\Product\ProductEntity $product
 * @var \Delivery\Domain\Delivery\DeliveryEntity $delivery
 * @var float $delivery_sum
 */
$sum = 0;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
</head>
<body>
<form method="POST" style="width: 500px" >
<label for="delivery">Транспортная компания</label>
<select name="delivery">
    <option value="">- самовывоз -</option>
    <?php foreach ($deliveries as $delivery):?>
    <option <?php echo (($delivery_select??null)===$delivery->getId()?'selected':'') ?> value="<?php echo $delivery->getId() ?>"><?php echo $delivery->getName() ?></option>
    <?php endforeach; ?>
</select>
    <br/><br/>

 <label for="address_from">Адрес отправки</label>
<select name="address_from">
    <option value="">- не выбрано -</option>
        <?php foreach ($addresses as $address):?>
            <option <?php echo (($address_from_select??null)===$address->getId()?'selected':'') ?> value="<?php echo $address->getId() ?>"><?php echo $address->getAddress() ?></option>
        <?php endforeach; ?>
</select>
    <br/><br/>
    <label for="address_to">Адрес получения</label>
    <select name="address_to">
        <option value="">- не выбрано -</option>
        <?php foreach ($addresses as $address):?>
            <option <?php echo (($address_to_select??null)===$address->getId()?'selected':'') ?> value="<?php echo $address->getId() ?>"><?php echo $address->getAddress() ?></option>
        <?php endforeach; ?>
    </select>
    <br/><br/>
<table style="width: 100%">
    <tr>
        <th>
            Товар
        </th>
        <th>
            Цена, руб
        </th>
        <th>
            Кол-во
        </th>
        <th>
            Вес, гр
        </th>
    </tr>
    <?php foreach ($products as $product):?>
<tr>
    <td>
        <?php echo $product->getName() ?>
    </td>
    <td>
        <?php echo $product->getPrice() ?>
    </td>
    <td>
        <?php echo $product->getAmount() ?>
    </td>
    <td>
        <?php echo $product->getWeight() ?>
    </td>
    <?php
    $sum += $product->getPrice() * $product->getAmount();
    ?>
</tr>
    <?php endforeach; ?>
</table>
    <br/>

    Сумма позиций: <?php echo $sum?> руб<br/>
    Сумма доставки: <?php echo $delivery_sum?> руб <?php if(isset($delivery_comment)) echo '('.$delivery_comment.')'  ?><br/>
    Итого: <?php echo $sum + $delivery_sum?> руб<br/><br/>

    <button name="submit" type="submit">Расчитать доставку</button>

</form>

</body>
</html>