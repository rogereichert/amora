<input name="data" type="date" id="data" />

<input name="datafin" type="date" id="datafin"  onmouseover="calculaDataFin()"  readonly/>
<input type="button" onclick="calculaDataFin()">

<input type="submit" onclick="calculaDataFin()">

<script type="text/javascript">

function calculaDataFin() {
var datainicial = document.getElementById("data").value;
var dias = 10;
var partes = datainicial.split("-");
var ano = partes[0];
var mes = partes[1]-1;
var dia = partes[2];

datainicial = new Date(ano,mes,dia);
datafinal = new Date(datainicial);
datafinal.setDate(datafinal.getDate() + dias);

var dd = ("0" + datafinal.getDate()).slice(-2);
var mm = ("0" + (datafinal.getMonth()+1)).slice(-2);
var y = datafinal.getFullYear();

var dataformatada = y + '-' + mm + '-' + dd;
var valor = document.getElementById('datafin').value = dataformatada;
return valor;

}

</script>