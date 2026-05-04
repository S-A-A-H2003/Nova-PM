export default function courses(){
    const button_create_courses = document.getElementById('button_create_courses');
    const form_create_courses = document.getElementById('form_create_courses');
    const view_courses = document.getElementById('view_courses');

    if (button_create_courses) {
        button_create_courses.addEventListener('click' , function() {
            if (form_create_courses.classList.contains('hidden')) {
                form_create_courses.classList.remove('hidden');
                view_courses.classList.add('hidden');
            }else{
                form_create_courses.classList.add('hidden');
                view_courses.classList.remove('hidden');
            }
        })
    }
    for (let index = 1; index <= courses_counter; index++) {
        const editBtn = document.getElementById(`button_edit_courses_${index}`);
        const editForm = document.getElementById(`form_edit_courses_${index}`);
        if (editBtn && editForm) {
            editBtn.addEventListener('click' , function() {
                if (editForm.classList.contains('hidden')) {
                    editForm.classList.remove('hidden');
                    if (form_create_courses) form_create_courses.classList.add('hidden');
                    if (view_courses) view_courses.classList.add('hidden');
                }else{
                    editForm.classList.add('hidden');
                    if (view_courses) view_courses.classList.remove('hidden');
                }
            })
        }
    }
}
