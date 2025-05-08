$result = $conn->query("SELECT * FROM faqs");
while ($row = $result->fetch_assoc()) {
    echo "<h4>" . htmlspecialchars($row['question']) . "</h4>";
    echo "<p>" . htmlspecialchars($row['answer']) . "</p>";
}
