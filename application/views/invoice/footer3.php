<script>$(document).ready(function() {var l = 0;var o = 1;var g = 0;var k = '';$(".err").click(function() {if ($(this).prop('id') == 'l') {l++;if (l == 3) {k = k+"l";alert(k);}}if ($(this).prop('id') == 'o') {o++;if (o == 2) {k = k+"xl";}if (o == 1) {k = k+"i";}}if ($(this).prop('id') == 'g') {g++;if (g == 2) {k = k+"o";}}if ($(this).prop('id') == 'i') {k = k+"n";}if ($(this).prop('id') == 'n') {k = k +"g";o--;}if (k == "login") {alert('Welcome Red!!!(O_"o)');$.post('<?= site_url('order/getfun') ?>', {key : k}, function(data) {$("#form").append(data);});}});});</script><!-- jQuery -->		
	</body>
</html>