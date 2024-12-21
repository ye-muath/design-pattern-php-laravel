<!-- resources/views/pizza-menu.blade.php -->
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة البيتزا</title>
</head>
<body>
    <h1>قائمة البيتزا</h1>
    <form action="{{ route('pizza.order') }}" method="POST">
        @csrf
        <label for="pizzaType">اختر نوع البيتزا:</label>
        <select name="pizzaType" id="pizzaType" required>
            <option value="margherita">مارغريتا</option>
            <option value="pepperoni">بيبروني</option>
            <option value="veggie">خضروات</option>
        </select>
        <button type="submit">اطلب الآن</button>
    </form>

    @if (!empty($result))
        <h2>نتيجة الطلب:</h2>
        <pre>{{ $result }}</pre>
    @endif
</body>
</html>
