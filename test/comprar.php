<html>
  <head>
    <title>
    ..:: BORRACHARIA DO TUX ::..
    <title/>
  <head/>
  <body>
    <h1>Borracharia do Tux</h1>
    <form action="processar.php" method="post">
      <table border="1">
        Item
        Quantidade
	      <tr>
        <td>Rodas</td>
        <td><input type="text" name="nrodas" size="3" maxlength="3"></td>
        </tr>
        <tr>
        <td>Pneus</td>
        <td><input type="text" name="npneus" size="3" maxlength="3"></td>
        </tr>
        <tr>
        <td>Parafusos</td>
        <td><input type="text" name="nparafusos" size="3" maxlength="3"></td>
        </tr>
        <tr>
        <td>Como voce conheceu a Borracharia do Tux?</td>
        <td><select name="find">
              <option value="a">Na 4Linux</option>
              <option value="b">Anuncio de TV</option>
              <option value="c">internet</option>
              <option value="d">indicacao</option>
            </select>
        </td>
        </tr>
        <tr>
        <td colspan="2"><input type="submit" value="Enviar"></td>
        </tr>
      </table>
    </form>
  <body/>
</html>
