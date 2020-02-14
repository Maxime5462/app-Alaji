<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>Note de l'entretien oral</h1><form method="post" action="resultat.php">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Question 1</label>
                <input type="text" class="form-control mb-2" id="inlineFormInput1" name="question1" placeholder="0 ou 1">
            </div>
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
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Question</th>
                <th scope="col">Note du test</th>
                <th scope="col">Note de l'entretien</th>
                <th scope="col">Note globale</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Question 1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">Question 2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">Question 3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
            <tr>
                <th scope="row">Question 4</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php
$qo1 = $_POST['question1'];
$qo2 = $_POST['question2'];
$qo3 = $_POST['question3'];
$qo4 = $_POST['question4'];


print("<center>Réponse 1 : $qo1 Réponse 2 : $qo2 Réponse 3 : $qo3 Réponse 4 : $qo4</center>");
?>
