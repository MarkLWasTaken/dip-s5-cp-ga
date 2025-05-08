<?php
// e-waste-we-buy.php
include 'header.php'; // common header

$items = [
    "Mobile Phones",
    "Laptops & Computers",
    "Televisions",
    "Printers & Scanners",
    "Household Electronics",
];
?>

<h2>E-waste We Buy</h2>
<p>We responsibly collect and buy the following types of electronic waste:</p>
<ul>
    <?php foreach ($items as $item): ?>
        <li><?= htmlspecialchars($item) ?></li>
    <?php endforeach; ?>
</ul>

<?php include 'footer.php'; ?>
