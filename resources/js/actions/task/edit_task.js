export default function edit_task(){
    const button_edit_task = document.getElementById('button_edit_task');
    const edit_task = document.getElementById('edit_task');
    const close_form_edit_task = document.getElementById('close_form_edit_task');
    if (button_edit_task && edit_task) {
        button_edit_task.addEventListener('click' , function () {
            if (edit_task.classList.contains('hidden')) {
                edit_task.classList.remove('hidden');
            }else{
                edit_task.classList.add('hidden');
            }
        })
    }
    if (close_form_edit_task && edit_task) {
        close_form_edit_task.addEventListener('click' , function() {
            edit_task.classList.add('hidden');
        })
    }
}
