
<x-x-header />


    <section >
        <div class="container d-flex flex-column gap-5">
            <div class="d-flex gap-3 user_name align-items-center">
                <img alt="иконка пользователя" src="/img/user_cub.svg">
                <h2 class="">Привет, курьер Пользователь</h2>
            </div>
                <div class="d-flex justify-content-between  nav_personal"> 
                    <a style="color: aliceblue;" id="get">Личная информация</a>
                    <a style="color: aliceblue;">Доступные Заказы</a>
                    <a style="color: aliceblue;">Ваши заказы</a>
                </div>
                    <div class="d-flex flex-column ">
                        <div class="d-flex gap-5 information_personal_text">
                            <div class="d-flex flex-column fw-bold">
                                <span>Имя</span>
                                <span>Фамилия</span>
                                <span>Отчество</span>
                                <span>Номер телефона</span>
                                <span>Электронная почта</span>
                                <span>Паспортные данные</span>
                            </div>
                                  <div class="d-flex flex-column">
                                    <span>Кирилл</span>
                                    <span>Тихонов</span>
                                    <span>Алексеевич</span>
                                    <span>+ 7 917 041 48 64</span>
                                     <span>kirilltih2@gmail.com</span>
                                     <span>*********</span>
                                 </div>
                        </div>
                        <button class="button_change">Изменить</button>
                    </div>
                        <div>
                            <div class="d-flex flex-column gap-3" style="margin-bottom: 20px;">
                                <span class="fs-3">Ваши заказы за период времени</span>
                                <div class="d-flex justify-content-between data_orders">
                                <select class="select">
                                    <option disabled>Выбрать</option>
                                    <option> Январь</option>
                                    </select>
                                    <div class="data_orders_input d-flex align-items-center gap-2">
                                        <input type="date">
                                        <div></div>
                                        <input  type="date">
                                    </div>
                                </div>
                            </div>
                    <div class="d-flex flex-column user_orders">
                                <div class="d-flex user_orders_information align-items-center ">
                            
                                    <span>1</span>
                                    <span>Продукты</span>
                            
                                 </div>
                                <div class="d-flex user_orders_information">
                            
                                    <span>1</span>

                                 </div>
                             <div class="d-flex user_orders_information">
                            
                            <span>1</span>

                             </div>
                         </div>
                    </div>
        </div>
    </section>
 
<x-footer/>

<script>
//     setTimeout(function(){
// 	document.getElementById('message').style.display = 'none';
//    }, 5000);
//     let form = document.querySelector('.form_group');
//     let button = document.querySelector('.addButton');
//     console.log(button);
//     console.log(form);
//     button.addEventListener("click", (event) => {
//         if(form.classList.contains('hidden')) {
//             button.textContent = 'Скрыть панель';
            
//             forShow();
//         } else {
//             isHidden();
//             button.textContent = 'Добавить группу';
//         }
        
//     });

//     function isHidden() {
//         form.classList.add('hidden');
//     }

//     function forShow() {
//         form.classList.remove('hidden');
//     }

    
//     let list =document.querySelector('.list');
//     let redbutton=document.querySelector('.redbutton');
//    redbutton.addEventListener("click", (event) => {
//         if(list.classList.contains('hidden2')) {
//             redbutton.textContent = 'Редактировать группу';
            
//             forShow2();
//         } else {
//             isHidden2();
//             redbutton.textContent = 'Скрыть список';
//         }
        
//     });

//     function isHidden2() {
//         list.classList.add('hidden2');
//     }

//     function forShow2() {
//         list.classList.remove('hidden2');
//     }

</script>