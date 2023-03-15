$stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(array('success' => false, 'message' => 'Email address already in use.'));
    exit();
}

//$password_hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare('INSERT INTO users ( email, upswd) VALUES (?, ?)');
$stmt->bind_param('ss', $email, $password);
$stmt->execute();

echo json_encode(array('success' => true,'message' => 'Registered Successfully !!!'));
exit();
?>
