<script>
// JavaScript Document
//adiciona mascara de cnpj
function MascaraCNPJ(cnpj){
        if(mascaraInteiro(cnpj)==false){
                event.returnValue = false;
        }       
        return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//adiciona mascara de cep
function MascaraCep(cep){
                if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }       
        return formataCampo(cep, '00.000-000', event);
}

//adiciona mascara de data
function MascaraData(data){
        if(mascaraInteiro(data)==false){
                event.returnValue = false;
        }       
        return formataCampo(data, '00/00/0000', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(tel){  
        if(mascaraInteiro(tel)==false){
                event.returnValue = false;
        }       
        return formataCampo(tel, '(00) 0000-0000', event);
}

//adiciona mascara ao CPF
function MascaraCPF(cpf){
        if(mascaraInteiro(cpf)==false){
                event.returnValue = false;
        }       
        return formataCampo(cpf, '000.000.000-00', event);
}

//valida telefone
function ValidaTelefone(tel){
        exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(tel.value))
                alert('Numero de Telefone Invalido!');
}

//valida CEP
function ValidaCep(cep){
        exp = /\d{2}\.\d{3}\-\d{3}/
        if(!exp.test(cep.value))
                alert('Numero de Cep Invalido!');               
}

//valida data
function ValidaData(data){
        exp = /\d{2}\/\d{2}\/\d{4}/
        if(!exp.test(data.value))
                alert('Data Invalida!');                        
}

//valida o CPF digitado
function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" ); 
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }       
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado)        
                alert('CPF Invalido!');         
}

//valida numero inteiro com mascara
function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
}

//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
        var cnpj = ObjCnpj.value;
        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
        var dig1= new Number;
        var dig2= new Number;

        exp = /\.|\-|\//g
        cnpj = cnpj.toString().replace( exp, "" ); 
        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

        for(i = 0; i<valida.length; i++){
                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
                dig2 += cnpj.charAt(i)*valida[i];       
        }
        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

        if(((dig1*10)+dig2) != digito)  
                alert('CNPJ Invalido!');

}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
        var boleanoMascara; 

        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace( exp, "" ); 

        var posicaoCampo = 0;    
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;; 

        if (Digitato != 8) { // backspace 
                for(i=0; i<= TamanhoMascara; i++) { 
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/")) 
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                        if (boleanoMascara) { 
                                NovoValorCampo += Mascara.charAt(i); 
                                  TamanhoMascara++;
                        }else { 
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                                posicaoCampo++; 
                          }              
                  }      
                campo.value = NovoValorCampo;
                  return true; 
        }else { 
                return true; 
        }
}

function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
               

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
function letraMaiuscula() {
 
    var x = document.getElementById("nome");
    x.value = x.value.toUpperCase();
       
}

function validaSenha() {

        var senha = document.getElementById('senha');
        var confsenha = document.getElementById("confsenha");
        var batao = document.getElementById('cadastrar');
        if (senha.value != confsenha.value) {
            alert('Senhas não confere');
            senha.value = '';
            confsenha.value = '';
            batao.disabled = true;
        } else {
            batao.disabled = false;
        }
    }
</script>
        <script>
//                var data = new Date();
//                
//                var hora = data.getHours();
//                var min = data.getMinutes();
//                
//                var str_hora = hora + ":" + min;

            // alert("Hora atual " + str_hora);

            //document.write(str_hora);

            function registrarHora() {
                var data = new Date();
                var hora = data.getHours();
                var min = data.getMinutes();
                var dia = data.getDate();
                var sem = data.getDay();
                var mes = data.getMonth();
                var ano = data.getFullYear();
                var ent = document.getElementById('entrada');
                var saiInt = document.getElementById('saiInt');
                var entInt = document.getElementById('entInt');
                var sai = document.getElementById('saida');

                switch (sem) {
                    case 0:
                        sem = "Domingo, ";
                        break;

                    case 1:
                        sem = "Segunda-feira, ";
                        break;

                    case 2:
                        sem = "Terça-feira, ";
                        break;

                    case 3:
                        sem = "Quarta-feira, ";
                        break;

                    case 4:
                        sem = "Quinta-feira, ";
                        break;

                    case 5:
                        sem = "Sexta-feira, ";
                        break;

                    case 6:
                        sem = "Sábado, ";
                        break;
                }

                switch (mes) {
                    case 0:
                        mes = " Janeiro de ";
                        break;

                    case 1:
                        mes = " Fevereiro de ";
                        break;

                    case 2:
                        mes = " Março de ";
                        break;

                    case 3:
                        mes = " Abril de ";
                        break;

                    case 4:
                        mes = " Maio de ";
                        break;

                    case 5:
                        mes = " Junho de ";
                        break;

                    case 6:
                        mes = " Julho de ";
                        break;

                    case 7:
                        mes = " Agosto de ";
                        break;

                    case 8:
                        mes = " Setembro de ";
                        break;

                    case 9:
                        mes = " Outubro de ";
                        break;

                    case 10:
                        mes = " Novembro de ";
                        break;

                    case 11:
                        mes = " Dezembro de ";
                        break;
                }

                if (min < 10) {
                    min = "0" + min;
                }
                if (hora < 10) {
                    hora = "0" + hora;
                }
                var str_hora = hora + ":" + min;
                var str_data = sem + dia + " de" + mes + ano + ".";


                if (ent.value == "") {
					if (confirm("Deseja Registrar " + str_hora + "?")== true ){
					ent.value = str_hora;
					}
                } else if (saiInt.value == "") {
				if (confirm("Deseja Registrar " + str_hora + "?")== true ){
                    saiInt.value = str_hora;
					}
                } else if (entInt.value == "") {
				if (confirm("Deseja Registrar " + str_hora + "?")== true ){
                    entInt.value = str_hora;
					}
                } else if (sai.value == "") {
				if (confirm("Deseja Registrar " + str_hora + "?")== true ){
                    sai.value = str_hora;
					
					}
                }
				
                document.getElementById('data').innerHTML = str_data;
                //h.value = str_hora;
                // document.write(str_hora);

            }
            function somaHora() {
                var ent = document.getElementById('entrada');
                var sai = document.getElementById('saida');
				
				
                horaEnt = ent.value.substring(0, 2);
                minEnt = ent.value.substring(3, 5);

                horaSai = sai.value.substring(0, 2);
                minSai = sai.value.substring(3, 5);

				
				

                if (minSai < minEnt) {
                    minTrabalho = ((parseInt(minSai) + 60) - minEnt);
                    horaTrabalho = (horaSai - 1) - horaEnt;
                } else {
				
                    minTrabalho = minSai - minEnt;
                    horaTrabalho = horaSai - horaEnt;
                }
				if(minTrabalho < 9){
				minTrabalho = "0" + minTrabalho;
				
				}
				
				 document.getElementById('horaExtra').innerHTML = horaTrabalho+":"+minTrabalho;
				}
				
			
			function intervalo(){
				var intEnt = document.getElementById('entInt');
                var intSai = document.getElementById('saiInt');
				
				
				horaIntEnt = intEnt.value.substring(0, 2);
                minIntEnt = intEnt.value.substring(3, 5);

                horaIntSai = intSai.value.substring(0, 2);
                minIntSai = intSai.value.substring(3, 5);
				
				
				
				if (minIntSai < minIntEnt) {
                    minIntevalo = ((parseInt(minIntSai) + 60) - minIntEnt);
                    horaIntervalo = (horaIntSai - 1) - horaIntEnt;
                                } else {

                                    minIntervalo = minIntSai - minIntEnt;
                                    horaIntervalo = horaIntSai - horaIntEnt;
                                }
                                alert(horaIntervalo + ":" + minIntervalo);

                                if (minIntervalo < 9) {
                                    minIntervalo = "0" + minIntervalo;


                                }

                                document.getElementById('horaIntervalo').innerHTML = horaIntervalo + ":" + minIntervalo;
                            }

        </script>