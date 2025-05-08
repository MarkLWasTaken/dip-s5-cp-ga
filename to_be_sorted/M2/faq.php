<?php
// faq.php
include 'header.php';

// Example FAQs — you could fetch these from a database instead
$faqs = [
    ["q" => "What is e-waste?", "a" => "Electronic waste (e-waste) refers to discarded electronic appliances."],
    ["q" => "Do you accept broken electronics?", "a" => "Yes, we accept most broken or damaged electronics."],
    ["q" => "Can I sell items directly?", "a" => "Yes, use the Buy/Sell Request page to start the process."],
];
?>

<h2>Frequently Asked Questions (FAQ)</h2>

<?php foreach ($faqs as $faq): ?>
    <div class="faq-item">
        <h4><?= htmlspecialchars($faq['q']) ?></h4>
        <p><?= htmlspecialchars($faq['a']) ?></p>
    </div>
<?php endforeach; ?>

<?php include 'footer.php'; ?>
