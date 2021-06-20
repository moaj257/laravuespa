<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We Chat</title>
</head>
<body>
</body>
<script>
    let init = () => {
        let user = @json($user);
        let token = "{{$token}}";
        localStorage.setItem('user', JSON.stringify(user));
        localStorage.setItem('_token', token);
        window.location.href = '/';
    }

    init();
</script>
</html>