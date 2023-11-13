<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tela de Tickets</title>
    <link rel="stylesheet" href="style.css"> 
<style>
.ticket-container {
    width: 80%;
    margin: 20px auto;
    background-color: #f5f5f5;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    font-family: 'Arial', sans-serif;
}

.ticket {
    border-bottom: 1px solid #eee;
    padding: 10px;
    margin-bottom: 10px;
}

.ticket:last-child {
    border-bottom: none;
}

.ticket-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

h1 {
    text-align: center;
    color: #333;
}

h2 {
    color: #007bff;
}

button {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

button:hover {
    background-color: #0056b3;
}


</style>

</head>
<body>
    <div class="ticket-container">
        <h1>Tickets</h1>
        <!-- Lista de tickets -->
        <div class="ticket" id="ticket1">
            <h2>Ticket #1</h2>
            <p>Descrição do ticket...</p>
            <button onclick="responderTicket(1)">Responder</button>
        </div>
        <!-- Repetir para outros tickets -->
    </div>

    <script src="script.js"></script> <!-- Link para o seu arquivo JavaScript -->
</body>
</html>
