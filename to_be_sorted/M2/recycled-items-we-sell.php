<?php
// recycled-items-we-sell.php
include 'header.php';

// Dummy data for available recycled items
$recycledItems = [
    ["name" => "Refurbished Laptop", "price" => "RM 500"],
    ["name" => "Recycled Cables", "price" => "RM 20"],
    ["name" => "Reclaimed Metals", "price" => "RM 15/kg"],
];
?>

<h2>Recycled Items We Sell</h2>
<p>Support sustainability! Buy recycled materials and refurbished electronics here:</p>

<table border="1">
    <tr>
        <th>Item</th>
        <th>Price</th>
    </tr>
    <?php foreach ($recycledItems as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= htmlspecialchars($item['price']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>
