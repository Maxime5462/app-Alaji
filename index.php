
<?php

define ('USER_ID', $_GET ["id"]); // define définit une constante, le nom et la valeur en 2ème critère

const BASE_API = 'http://e-learning.alaji.fr/webservice/rest/server.php?wstoken=92e270ed7da760d3d6df191e5582337b&moodlewsrestformat=json&wsfunction=';
// base statique, qui ne change pas, seule la fin est dynamique


$content = file_get_contents(BASE_API . 'core_user_get_users&criteria[0][key]=id&criteria[0][value]=' . USER_ID);
// file_get_contents Lit tout un fichier dans une chaîne

$data = json_decode ($content);
// json decode Décode une chaîne JSON

$content = file_get_contents(BASE_API . 'mod_quiz_get_user_attempts&quizid=202&userid=' . USER_ID);

$data = json_decode ($content);

$sumgrades = $data->attempts[0]; // récupération des notes du quizz (1ère note, 1er essai)

$content = file_get_contents(BASE_API . 'mod_quiz_get_attempt_review&attemptid=' . $sumgrades->id);

$data = json_decode ($content);

$sum = $data->questions[0]->mark;

$dataCount = count($data->questions);

$billy =[];

for ($i=0; $i < $dataCount; $i++) {
    array_push($billy, (int)$data->questions[$i]->mark);
}

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>Note de l'entretien oral</h1>
    <form method="post" action="">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Question 1</label>
                <input type="text" class="form-control mb-2" id="inlineFormInput1" name="question1" placeholder="0 ou 1">
            </div></br>
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Question 2</label>
                <input type="text" class="form-control mb-2" id="inlineFormInput2" name="question2" placeholder="0 ou 1">
            </div>
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Question 3</label>
                <input type="text" class="form-control mb-2" id="inlineFormInput3" name="question3" placeholder="0 ou 1">
            </div>
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Question 4</label>
                <input type="text" class="form-control mb-2" id="inlineFormInput4"  name="question4" placeholder="0 ou 1">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
            </div>
        </div>
    </form>
    <?php
    $qo1 = $_POST['question1'];
    $qo2 = $_POST['question2'];
    $qo3 = $_POST['question3'];
    $qo4 = $_POST['question4'];
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Question</th>
                <th scope="col">Note du test</th>
                <th scope="col">Note de l'entretien</th>
                <th scope="col">Note globale</th>
                <th scope="col">Commentaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Question 1</th>
                <td><?php echo $billy[0]; ?></td>
                <td><?php echo $qo1; ?></td>
                <td><?php echo $c1=(0.23*$billy[0]+0.77*$qo1); ?></td>
                <td><?php if ($c1>=0.5){echo "Bien";} else {echo "Pas Bien";} ?></td>

            </tr>
            <tr>
                <th scope="row">Question 2</th>
                <td><?php echo $billy[1]; ?></td>
                <td><?php echo $qo2; ?></td>
                <td><?php echo $c2=(0.89*$billy[0]+0.11*$qo1); ?></td>
                <td><?php if ($c2>=0.5){echo "Bien";} else {echo "Pas Bien";} ?></td>
            </tr>
            <tr>
                <th scope="row">Question 3</th>
                <td><?php echo $billy[2]; ?></td>
                <td><?php echo $qo3; ?></td>
                <td><?php echo $c3=(0.52*$billy[0]+0.48*$qo1); ?></td>
                <td><?php if ($c3>=0.5){echo "Bien";} else {echo "Pas Bien";} ?></td>
            </tr>
            <tr>
                <th scope="row">Question 4</th>
                <td><?php echo $billy[3]; ?></td>
                <td><?php echo $qo4; ?></td>
                <td><?php echo $c4=(0.34*$billy[0]+0.66*$qo1); ?></td>
                <td><?php if ($c4>=0.5){echo "Bien";} else {echo "Pas Bien";} ?></td>
            </tr>
            <tr>
                <th scope="row">Résultat</th>
                <td></td>
                <td></td>
                <td></td>
                <td ><?php if (($c1+$c2+$c3+$c4)/4>=0.5){echo "Bravo";} else {echo "Pas Bravo";} ?></td>
            </tr>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
