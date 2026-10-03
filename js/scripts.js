/* =========================
   TOOLNEST JAVASCRIPT
   ========================= */


/* =========================
   SUCCESS / LOGOUT TOAST
   ========================= */


/* -------------------------
   CLOSE SUCCESS TOAST
   ------------------------- */

function closeToast() {

    const toast =
        document.getElementById("successToast");

    if (!toast) {
        return;
    }


    /* -------------------------
       START SLIDE-OUT ANIMATION
       ------------------------- */

    toast.classList.add("hide");


    /* -------------------------
       REMOVE TOAST
       ------------------------- */

    setTimeout(() => {

        toast.remove();

    }, 350);

}


/* -------------------------
   PAGE LOAD
   ------------------------- */

document.addEventListener(
    "DOMContentLoaded",
    () => {

        const toast =
            document.getElementById(
                "successToast"
            );


        /* -------------------------
           NO TOAST ON THIS PAGE
           ------------------------- */

        if (!toast) {
            return;
        }


        /* -------------------------
           REMOVE TOAST PARAMETERS
           FROM URL
           ------------------------- */

        const url =
            new URL(window.location.href);


        /* -------------------------
           REMOVE SUCCESS PARAMETER
           ------------------------- */

        if (
            url.searchParams.has("success")
        ) {

            url.searchParams.delete(
                "success"
            );

        }


        /* -------------------------
           REMOVE LOGOUT PARAMETER
           ------------------------- */

        if (
            url.searchParams.has("logout")
        ) {

            url.searchParams.delete(
                "logout"
            );

        }


        /* -------------------------
           UPDATE URL
           ------------------------- */

        window.history.replaceState(
            {},
            document.title,
            url.pathname +
            url.search
        );


        /* -------------------------
           AUTO CLOSE
           ------------------------- */

        setTimeout(() => {

            closeToast();

        }, 3500);

    }
);


/* =========================
   CATEGORY DROPDOWN
   ========================= */

document.addEventListener(
    "DOMContentLoaded",
    () => {

        const categoryFilter =
            document.querySelector(
                ".category-filter"
            );

        const categoryButton =
            document.getElementById(
                "categoryButton"
            );


        /* -------------------------
           CHECK ELEMENTS
           ------------------------- */

        if (
            !categoryFilter ||
            !categoryButton
        ) {
            return;
        }


        /* -------------------------
           TOGGLE DROPDOWN
           ------------------------- */

        categoryButton.addEventListener(
            "click",
            (event) => {

                event.stopPropagation();

                categoryFilter.classList.toggle(
                    "open"
                );

            }
        );


        /* -------------------------
           CLOSE WHEN CLICKING OUTSIDE
           ------------------------- */

        document.addEventListener(
            "click",
            (event) => {

                if (
                    !categoryFilter.contains(
                        event.target
                    )
                ) {

                    categoryFilter.classList.remove(
                        "open"
                    );

                }

            }
        );


        /* -------------------------
           CLOSE AFTER SELECTING
           ------------------------- */

        const categoryItems =
            document.querySelectorAll(
                ".category-menu-item"
            );


        categoryItems.forEach(
            (item) => {

                item.addEventListener(
                    "click",
                    () => {

                        categoryFilter.classList.remove(
                            "open"
                        );

                    }
                );

            }
        );

    }
);


/* =========================
   PROFILE DROPDOWN
   ========================= */

const profileButton =
    document.getElementById(
        "profileButton"
    );

const profileDropdown =
    document.getElementById(
        "profileDropdown"
    );


if (
    profileButton &&
    profileDropdown
) {


    /* -------------------------
       TOGGLE PROFILE
       ------------------------- */

    profileButton.addEventListener(
        "click",
        function (event) {

            event.stopPropagation();


            profileDropdown.classList.toggle(
                "show"
            );


            profileButton.classList.toggle(
                "active"
            );


            const isOpen =
                profileDropdown.classList.contains(
                    "show"
                );


            profileButton.setAttribute(
                "aria-expanded",
                isOpen
                    ? "true"
                    : "false"
            );

        }
    );


    /* -------------------------
       CLOSE WHEN CLICKING OUTSIDE
       ------------------------- */

    document.addEventListener(
        "click",
        function (event) {

            if (
                !profileDropdown.contains(
                    event.target
                ) &&
                !profileButton.contains(
                    event.target
                )
            ) {

                profileDropdown.classList.remove(
                    "show"
                );


                profileButton.classList.remove(
                    "active"
                );


                profileButton.setAttribute(
                    "aria-expanded",
                    "false"
                );

            }

        }
    );

}