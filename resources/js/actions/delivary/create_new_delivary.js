export default function create_new_delivary(){
    const button_create_delivery = document.getElementById('button_create_delivery');
    const create_delivery = document.getElementById('create_delivery');
    const close_form_new_delivery = document.getElementById('close_form_new_delivery');
    if (button_create_delivery) {
        button_create_delivery.addEventListener('click' , function () {
            if (create_delivery.classList.contains('hidden')) {
                create_delivery.classList.remove('hidden');
            }else{
                create_delivery.classList.add('hidden');
            }
        })
    }
    if (close_form_new_delivery) {
        close_form_new_delivery.addEventListener('click' , function() {
            create_delivery.classList.add('hidden');
        })
    }
}
