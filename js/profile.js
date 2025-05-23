const bioContentEl = document.getElementById("bio-content");
const bioEditBtn = document.getElementById("bio-edit-btn");
const bioCancelBtn = document.getElementById("bio-cancel-btn");
const bioSetBtn = document.getElementById("bio-set-btn");

const displayNameContentEl = document.getElementById("displayname-content");
const displayNameEditBtn = document.getElementById("displayname-edit-btn");
const displayNameCancelBtn = document.getElementById("displayname-cancel-btn");
const displayNameSetBtn = document.getElementById("displayname-set-btn");

const usernameContentEl = document.getElementById("username-content");
const usernameEditBtn = document.getElementById("username-edit-btn");
const usernameCancelBtn = document.getElementById("username-cancel-btn");
const usernameSetBtn = document.getElementById("username-set-btn");

const pfpEditBtn = document.getElementById("pfp-edit-btn");
const pfpEditForm = document.getElementById("pfp-edit-form");
const pfpCancelBtn = document.getElementById("pfp-cancel-btn");
const pfpRemoveForm = document.getElementById("pfp-remove-form");

const emailContentEl = document.getElementById("email-content");
const emailEditBtn = document.getElementById("email-edit-btn");
const emailCancelBtn = document.getElementById("email-cancel-btn");
const emailSetBtn = document.getElementById("email-set-btn");

function toggleInput(input) {
    /*
        Toggle the readonly attribue of an input or textarea elemnet

        Parameters:
            input(): An HTML DOM input element
    */
    if (input.hasAttribute("readonly")) {
        input.removeAttribute("readonly");
    } else {
        input.setAttribute("readonly", true);
    }
}

function toggleHidden(el) {
    /*
        Toggle the display of an element

        Parameters:
            el(HTMLElement): An HTML DOM element
    */
    if (!el) return;
    if (el.classList.contains("hidden")) {
        el.classList.remove("hidden");
    } else {
        el.classList.add("hidden");
    }
}

function toggleButtonList(btnList) {
    /*
        Toggle the display of all buttons in a list

        Parameters:
            btnList(List): A list of HTML DOM button elements
    */
    for(let i = 0; i < btnList.length; i++) {
        toggleHidden(btnList[i]);
    }
}

bioEditBtn.addEventListener("click", () => {
    toggleInput(bioContentEl);
    toggleButtonList([bioEditBtn, bioSetBtn, bioCancelBtn]);
});

bioCancelBtn.addEventListener("click", () => {
    toggleInput(bioContentEl);
    toggleButtonList([bioEditBtn, bioSetBtn, bioCancelBtn]);
});

displayNameEditBtn.addEventListener("click", () => {
    toggleInput(displayNameContentEl);
    toggleButtonList([displayNameEditBtn, displayNameSetBtn, displayNameCancelBtn]);
});

displayNameCancelBtn.addEventListener("click", () => {
    toggleInput(displayNameContentEl);
    toggleButtonList([displayNameEditBtn, displayNameSetBtn, displayNameCancelBtn]);
});

usernameEditBtn.addEventListener("click", () => {
    toggleInput(usernameContentEl);
    toggleButtonList([usernameEditBtn, usernameSetBtn, usernameCancelBtn]);
});

usernameCancelBtn.addEventListener("click", () => {
    toggleInput(usernameContentEl);
    toggleButtonList([usernameEditBtn, usernameSetBtn, usernameCancelBtn]);
});

emailEditBtn.addEventListener("click", () => {
    toggleInput(emailContentEl);
    toggleButtonList([emailEditBtn, emailSetBtn, emailCancelBtn]);
});

emailCancelBtn.addEventListener("click", () => {
    toggleInput(emailContentEl);
    toggleButtonList([emailEditBtn, emailSetBtn, emailCancelBtn]);
});

pfpEditBtn.addEventListener("click", () => {
    toggleHidden(pfpEditBtn);
    toggleHidden(pfpEditForm);
    toggleHidden(pfpRemoveForm);
});

pfpCancelBtn.addEventListener("click", () => {
    toggleHidden(pfpEditBtn);
    toggleHidden(pfpEditForm);
    toggleHidden(pfpRemoveForm);
});
