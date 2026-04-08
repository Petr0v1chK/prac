<?php
$page_title = "Обратная связь";
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

<div class="form-wrapper">
    <div class="form-container">
        <h2>Обратная связь</h2>
        
        <form>
            <input type="text" name="surname" placeholder="Фамилия" required>
            <input type="text" name="name" placeholder="Имя" required>
            <textarea name="message" placeholder="Сообщение" required></textarea>
            <input type="tel" name="phone" placeholder="Телефон">
            <input type="email" name="email" placeholder="Почта">

            <div class="checkbox">
                <input type="checkbox" id="consent" name="consent" required>
                <label for="consent">Согласие на обработку персональных данных</label>
            </div>

            <button type="submit">Отправить</button>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>