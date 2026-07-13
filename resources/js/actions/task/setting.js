export default function setting(){
    const button_task_setting = document.getElementById('button_task_setting');
    const task_setting = document.getElementById('task_setting');

    if (button_task_setting && task_setting) {
        button_task_setting.addEventListener('click' , function () {
            if (task_setting.classList.contains('hidden')) {
                task_setting.classList.remove('hidden');
            }else{
                task_setting.classList.add('hidden');
            }
        })
    }
}
