export default function setting(){
     const button_project_setting = document.getElementById('button_project_setting');
     const project_setting = document.getElementById('project_setting');
     if (button_project_setting && project_setting) {
         button_project_setting.addEventListener('click' , function () {
             if (project_setting.classList.contains('hidden')) {
                 project_setting.classList.remove('hidden');
             }else{
                 project_setting.classList.add('hidden');
             }
         })
     }
}
