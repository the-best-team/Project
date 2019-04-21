$(document).ready(function () {

    //***** Объявление переменных ************//

    //Стиль для надписи, что список целей пуст
    let styleEmptyClass = $(".targets-index").children(".list-view").children(".empty");
    //Стиль для надписи Сколько карточек с целями показано из скольки "Showing 1-2 of 2 items."
    let styleSummaryClass = $(".targets-index").children(".list-view").children(".summary");
    let summaryClass = $(".allTasks").children(".grid-view").children(".summary");
    //Объект с потомками элемента div.list-view
    let arrCard = $(".targets-index").children(".list-view").children();
    //Количество карточек целей
    let countCard = arrCard.length - 1;
    //Элемент div.list-view
    let containerCard = $(".targets-index").children(".list-view");
    //Шапка таблицы всех задач
    let allTasks = $(".grid-view").children(".table").children("thead").children("tr").children("th");


    //***** Объявение функций ****************//
    /**
     * Функция прохода по карточкам целей и добавления им стилей css
     */
    function cardTargetsElement() {
        for (let i = 1; i <= countCard; i++){
            //добавляем класс карточкам целей
            let card = arrCard[i];
            card.classList.add("cardTargets");
        }
    }

    /**
     * Если список целей пуст - просто стилизуем надпись, говорящую об этом
     * Если карточки целей есть - добавляем классы
     */
    if(styleEmptyClass.length != 0){
        styleEmptyClass[0].style.marginTop = "50px";
    } else {
        //добавляем класс контейнеру с целями
        containerCard.addClass("targetsContainer");
        //вызываем функцию cardTargetsElement
        cardTargetsElement();
    }

    if(styleSummaryClass.length != 0 || summaryClass.length != 0){
        styleSummaryClass.addClass("summaryClass");
        summaryClass.addClass("summaryClass");
    }

    /**
     * Добавлляем иконки к сортируемым полям в таблице всех задач
     */
    if(allTasks.length != 0){
        allTasks[1].innerHTML = "<a href=\"/tasks?sort=name\" data-sort=\"name\"><i class=\"fa fa-sort\" aria-hidden=\"true\"></i> Название</a>";
        allTasks[4].innerHTML = "<a href=\"/tasks?sort=date_plane\" data-sort=\"date_plane\"><i class=\"fa fa-sort\" aria-hidden=\"true\"></i> Планируемая дата</a>";
        allTasks[5].innerHTML = "<a href=\"/tasks?sort=date_resolve\" data-sort=\"date_resolve\"><i class=\"fa fa-sort\" aria-hidden=\"true\"></i> Дата выполнения</a>";
    }

    /**
     * Удаляем классы в таблице, чтобы поменять стиль на свой
     */
    if($(".allTasks").length != 0){
        $("table")[0].classList.remove("table-striped");
        $("table")[0].classList.remove("table-bordered");
    }

});