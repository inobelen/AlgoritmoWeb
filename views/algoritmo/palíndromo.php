


<div class="container">
    
        <h1>Algoritmo Validar palabras Palindromos</h1>
        <div id="pintarPalabras"></div>

        <form action="" id="frmUsers">
            <div class="form-group">
            <label for="">Ingresa una palabra</label>
            <input type="text" class="form-control" name="name" id="">
            <button type="button" class="agregar btn btn-info" id="btnAdd" >Agregar</button>
            <button type="button" class="evaluar btn btn-warning" id="btnSave" >Evaluar</button>
            </div>            
        </form>
        <br>
        <div id="divElements"></div>
        <br>
        <div id="contenedorPalindromos"></div>

</div>


<script>
    //Parametros

    let palabras= []
    //funcion
    const  addJson= json =>{
        palabras.push(json);
        return palabras.length -1
    }
    //Funcion para eliminar
    function removeElement(event,posicion){
        event.target.parentElement.remove()
        delete palabras[posicion]
    }
    //Inpuls Dinamicos
    (function load(){
        const $contenedorPalindromos = document.getElementById('contenedorPalindromos');

        const $form = document.getElementById('frmUsers');
        const $divElements = document.getElementById('divElements');
        const $btnAdd = document.getElementById('btnAdd');
        const $btnSave = document.getElementById('btnSave');
        
        const templeteElement = (data, posicion) => {
            return (`
            <strong> ${data} </strong>
            <br>
            <button class="delete btn btn-danger" onClick="removeElement(event,${posicion})">Eliminar</button>
            `)
        }

        $btnAdd.addEventListener("click",(e)=>{
            
        if($form.name.value !=""){
            let index = addJson({
                palabra:$form.name.value
            })
            const $div = document.createElement("div")
            $div.classList.add("palindromo","puntero")
            $div.innerHTML = templeteElement(`${$form.name.value}`, index)
            $divElements.insertBefore($div,$divElements.firstChild)
            $contenedorPalindromos.innerHTML="";
            $form.reset();
        }else{
            alert("complete los campos");
        }

    })
    
    $btnSave.addEventListener('click', (event)=>{
            palabras = palabras.filter(el=>el !=null)
       
            console.log(palabras);

            // Validar palabras palindromas

            let palindromos= []


            for ( palabra of palabras) {

                console.log(palindromo(JSON.stringify(palabra.palabra)));
                palindromos.push('La palabra: ['+palabra.palabra+' ]: '+palindromo(JSON.stringify(palabra.palabra)));
            }

            var codigoHTML= "<div>";

            for( palindro of palindromos){    
                codigoHTML+="<br><strong><span>";
                codigoHTML+= palindro;
                codigoHTML+="</span></strong>";
            }
            

            codigoHTML+="</div>";

            $contenedorPalindromos.innerHTML= codigoHTML;
            //vaciar
            $divElements.innerHTML=""
            palabras = []
            
        })

    
    function palindromo(palabra){
        let array = palabra.split("");
        let alreves = array.reverse();

        return palabra == alreves.join("")? 'Es palindromo' : 'No es Palindromo'
    }

    })()
    

</script>




