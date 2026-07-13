export default function create_new_task(){
    const button_new_task = document.getElementById('button_new_task');
    const button_new_task_other = document.getElementById('button_new_task_other');
    const new_task = document.getElementById('new_task');
    const close_form_new_task = document.getElementById('close_form_new_task');

    if (button_new_task && new_task) {
        button_new_task.addEventListener('click' , function () {
            if (new_task.classList.contains('hidden')) {
                new_task.classList.remove('hidden');
            }else{
                new_task.classList.add('hidden');
            }
        })
    }

    if (button_new_task_other && new_task) {
        button_new_task_other.addEventListener('click' , function() {
            new_task.classList.remove('hidden');
        })
    }

    if (close_form_new_task && new_task) {
        close_form_new_task.addEventListener('click' , function() {
            new_task.classList.add('hidden');
        })
    }
}
