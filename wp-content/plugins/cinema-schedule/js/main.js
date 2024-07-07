/** Container du formulaire */
const container = document.querySelector("[data-el='main-form']")

/** Dernier ID des nouveaux éléments */
let newId = 0;

/**
 * Ajoute une nouvelle ligne de film.
 */
function addNewMovie() {
    /** Template de copie de l'élément */
    const template = document.querySelector("[data-template='cp-n']");
    /** Slug du tag name des éléments */
    const nameSlug = `new[${newId}]`

    //clone
    const clone = template.content.cloneNode(true).querySelector("div")

    //incrémentation nouveau ID
    newId++;
    //mise du data-id
    clone.dataset.id = newId.toString();

    //input du code du film
    const inputCode = clone.querySelector("[data-item='code-input']")
    inputCode.setAttribute("name", `${nameSlug}[code]`)

    //input de l'horaire
    const newItem = clone.querySelector("[data-item='single-schedule-input']")
    newItem.setAttribute("name", `${nameSlug}[schedules][]`)

    //button ajout d'horraire
    const btnScheduleAdd = clone.querySelector("[data-el='add-schedule-btn']")
    btnScheduleAdd.addEventListener('click', () => { addNewSchedule(clone.dataset.id, 'new') })

    const btnMovieDelete = clone.querySelector("[data-el='remove-movie-btn']")
    btnMovieDelete.addEventListener('click', () => { deleteMovie(clone.dataset.id, 'new') })

    //prise du container des horaires et mise du clone
    container.querySelector("#cine-schedule-form-contents").appendChild(clone)
}


/**
 * Ajoute un nouvel horaire dans la ligne
 * @param id ID de l'item
 * @param type Type de l'item (old ou new)
 */
function addNewSchedule(id, type)
{
    /** Template de copie de l'élément */
    const template = document.querySelector("[data-template='add-schedule']");
    //clone
    const clone = template.content.cloneNode(true).querySelector(".single-schedule")
    clone.querySelector('input').setAttribute("name", `${type}[${id}][schedules][]`)

    /** La ligne qui demande un nouveau horaire */
    const target = container.querySelector(`[data-type='${type}'][data-id='${id}']`)
    //la liste d'horaires
    const list = target.querySelector("[data-el='all-schedules']")

    list.appendChild(clone);
}

/**
 * Supprime une ligne de film.
 * @param id ID de l'item
 * @param type Type de l'item (old ou new)
 */
function deleteMovie(id, type)
{
    /** La ligne qui demande une suppression d'horaire */
    const target = container.querySelector(`[data-type='${type}'][data-id='${id}']`)
    target.remove()
}