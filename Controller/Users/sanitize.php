<?php
function sanitize_user(array $inputs): array
{
    try {
        $inputs['role'] = filter_var(trim($inputs['role']), FILTER_DEFAULT);
        $filters = [
            'id' => FILTER_SANITIZE_NUMBER_INT | FILTER_VALIDATE_INT,
            'nom' => ['filter' => FILTER_DEFAULT, 'flags' => FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW | FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-Za-z\s]+$/']],
            'prenom' => ['filter' => FILTER_DEFAULT, 'flags' => FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW | FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-Za-z\s]+$/']],
            'email' => FILTER_SANITIZE_EMAIL | FILTER_VALIDATE_EMAIL,
            'password' => FILTER_DEFAULT,
            'adresse' => FILTER_DEFAULT | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW,
            'numTel' => FILTER_SANITIZE_NUMBER_INT | FILTER_VALIDATE_INT,
            'profileImage' => FILTER_DEFAULT
        ];
        if ($inputs['role'] == "conducteur")
            $filters = array_merge($filters, [
                'modeleVoiture' => FILTER_DEFAULT,
                'nbPlaces' => FILTER_SANITIZE_NUMBER_INT | FILTER_VALIDATE_INT
            ]);
        $data = filter_var_array(array_map('trim', $inputs), $filters);
        $data['role'] = $inputs['role'];
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT, ['cost' => 12]);
        if ($_FILES['profileImage']['size'] === 0)
            $data['profileImage'] = file_get_contents("../View/assets/img/profileImage.png");
        else
            $data['profileImage'] = file_get_contents($_FILES['profileImage']['tmp_name']);
    } catch (Throwable $e) {
        echo $e->getMessage();
    }
    unset($inputs);
    unset($filters);
    return $data;
}

function sanitize_login(array $inputs): array
{
    try {
        $filters = [
            'email' => FILTER_SANITIZE_EMAIL | FILTER_VALIDATE_EMAIL,
            'password' => FILTER_DEFAULT,
        ];
        $data = filter_var_array(array_map('trim', $inputs), $filters);
        if (!password_verify($data["password"], password_hash($data['password'], PASSWORD_DEFAULT, ['cost' => 12])))
            return [];
    } catch (Throwable $e) {
        echo $e->getMessage();
    }
    return $data;
}
