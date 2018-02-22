<div class="col-9">
  <form method="post">
    <label>Voornaam</label>
    <input type="text" name="employeeFirstname">

    <label>Achternaam</label>
    <input type="text" name="employeeLastname">

    <label>Telefoon nummer</label>
    <input type="number" name="employeePhonenumber">

    <label>Medewerker functie</label>
    <select name="employeeJob">
      <option>Medewerker</option>
      <option>Manager</option>
      <option>Eigenaar</option>
    </select>

    <label>Medewerkercode</label>
    <input type="number" name="employeeCode">

    <label>MedewerkerPassword</label>
    <input type="password" name="employeePassword">

    <label>Medewerker wachtwoord bevestigen</label>
    <input type="password" name="employeePasswordConfirm">

    <br>
    <input type="submit" name="employeeCreate" value="Opslaan">

  </form>
</div>
