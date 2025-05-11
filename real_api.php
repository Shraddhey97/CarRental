<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $userMessage = trim($_POST['message'] ?? '');
    $apiKey = 'AIzaSyD9BB5pVH8fXwTBK1ldPI9dtFGdBxQUOjg'; // API Key

    // Check if the message is empty
    if (empty($userMessage)) {
        echo json_encode(['reply' => 'Missing message.']);
        exit;
    }

    // Define prompt with strict car-only rule and greeting handling
    $prompt = "You are an expert AI that only talks about cars. 
If the user's message is a greeting like 'hi', 'hello', or 'hey', respond with a friendly car-themed greeting. 
For example: 'Hi! Ready to chat about cars?' 
If the user's message is not related to cars, reply strictly with: 
'I can only talk about cars. Let's discuss vehicles, engines, models, or anything automobile-related!' 
Never answer questions outside of this domain. 
User said: \"$userMessage\"";

    // Prepare Gemini API URL
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" . $apiKey;

    // Prepare the request payload
    $postData = json_encode([
        'contents' => [[
            'parts' => [[ 'text' => $prompt ]]
        ]]
    ]);

    $headers = [
        'Content-Type: application/json'
    ];

    // Send request to Gemini API
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    // Check for cURL errors
    if ($error) {
        echo json_encode(['reply' => 'Error: ' . $error]);
        exit;
    }

    // Decode API response and extract reply text
    $responseData = json_decode($response, true);
    $botReply = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? 'No valid response.';

    // List of car-related and greeting keywords for response validation
    $carKeywords = [
        'car', 'vehicle', 'engine', 'automobile', 'SUV', 'sedan', 'hatchback', 'brake',
        'transmission', 'wheel', 'motor', 'horsepower', 'tyre', 'fuel', 'mileage',
        'speed', 'dashboard', 'torque', 'gearbox', 'diesel', 'petrol', 'electric', 'hybrid',
        'Toyota', 'Honda', 'Ford', 'BMW', 'Mercedes', 'Audi', 'Chevrolet', 'Kia', 'Hyundai',
        'Volkswagen', 'Nissan', 'Mazda', 'Jeep', 'Lexus', 'Porsche', 'Tesla', 'Ferrari',
        'Lamborghini', 'Subaru', 'Jaguar', 'Bugatti', 'McLaren', 'Rolls-Royce', 'Mini','hyundai', 'koenigsegg',
        'hi', 'hello', 'hey', 'greetings'
    ];

    // Check if response contains any allowed keyword
    $isAllowedResponse = false;
    foreach ($carKeywords as $keyword) {
        if (stripos($botReply, $keyword) !== false) {
            $isAllowedResponse = true;
            break;
        }
    }

    // Force a fallback reply if content is off-topic
    if (!$isAllowedResponse) {
        $botReply = "I can only talk about cars. Let's discuss vehicles, engines, models, or anything automobile-related!";
    }

    // Return the final reply as JSON
    echo json_encode(['reply' => $botReply]);
}
?>
