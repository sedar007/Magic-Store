let nb_cartSelected = 0;
let checkboxes = undefined;

function afficheSelection(){
    let id_select = document.getElementById("val-id-cartCount");
    let cart = document.getElementById("addCart");

    if(nb_cartSelected <= 0)
        cart.classList.add("addCart-disable")
    else{
        cart.classList.remove("addCart-disable");

    }
    if(nb_cartSelected > 0)
        id_select.innerText = nb_cartSelected;
    else
        id_select.innerText = 'none';
}
function addCart(){
    let elements = document.querySelectorAll('.carte');

    let form = document.getElementById("content-shop");



    let log = form.nextElementSibling

    // récupération de toutes les checkbox du formulaire
    checkboxes = form.querySelectorAll("input[type='checkbox']")

    // ajout des écouteurs
    // checkboxes.forEach(check => check.addEventListener('change', function (event){
    //     displayCheckboxes()
    // }))
    afficheSelection();
    // console.log(checkboxes);
    elements.forEach((elem, indice)=>{
        elem.addEventListener('click',function (){
            // elem.classList.toggle("active-selection");

            checkboxes[indice].checked = !checkboxes[indice].checked;
            if(checkboxes[indice].checked) {
                elem.classList.add("active-selection");
                nb_cartSelected++;
                // console.log(nb_cartSelected);
            }
            else {
                elem.classList.remove("active-selection");
                nb_cartSelected--;
            }


            afficheSelection()

        })


    })


}
function addCheckcarte(){
    let form = document.getElementById("content-shop");



    let log = form.nextElementSibling
    checkboxes = form.querySelectorAll("input[type='checkbox']")

    checkboxes.forEach(check => check.addEventListener('change', function (event){
        console.log(check.checked)
    }))

//         else {
//             check.parentElement.parentElement.classList.remove("active-selection");
//             nb_cartSelected--;
//         }
//
//         if(nb_cartSelected > 0)
//             id_select.innerText = nb_cartSelected;
//         else
//             id_select.innerText = 'none';
//
//         console.log(check.parentElement.parentElement)
//     }))
}

function modifQteCart(){
    let qte = document.getElementById("cout-total-cart");
    let cout = 0;
    let cartes = document.querySelectorAll('.carte-cart');
    cartes.forEach((carte, indice)=>{
        carte.classList.add("active-selection");
        cout+= (carte.children[1].children[1].innerHTML) * 0.75;

    })
    console.log(cout)
    qte.innerHTML = cout + '$';


}
function  start(){

    // addCart();
    modifQteCart();
    // addCheckcarte();


}
document.addEventListener('DOMContentLoaded',function (){
    start();


})