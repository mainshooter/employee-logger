<div class="col-9">

  <h1><?php echo $message; ?></h1>

  <form method="post">
    <label>Voornaam</label>
    <input type="text" name="employeeFirstname" required>

    <label>Achternaam</label>
    <input type="text" name="employeeLastname" required>

    <label>Telefoon nummer</label>
    <input type="number" name="employeePhonenumber">

    <label>Medewerker functie</label>
    <select name="employeeJob" required>
      <option value="employee">Medewerker</option>
      <option value="manager">Manager</option>
      <option value="owner">Eigenaar</option>
    </select>

    <label>Medewerkercode</label>
    <input type="number" name="employeeCode" required>

    <label>MedewerkerPassword</label>
    <input type="password" name="employeePassword" required>

    <label>Medewerker wachtwoord bevestigen</label>
    <input type="password" name="employeePasswordConfirm" required>

    <br>
    <input type="submit" name="employeeCreate" value="Opslaan">

  </form>
</div>
