/* =========================
   TOOLNEST JAVASCRIPT
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


    // Start slide-out animation

    toast.classList.add("hide");


    // Remove toast after animation

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


        // No toast on this page

        if (!toast) {
            return;
        }


        /* -------------------------
           REMOVE SUCCESS FROM URL
           ------------------------- */

        const url =
            new URL(window.location.href);


        if (
            url.searchParams.has("success")
        ) {

            url.searchParams.delete(
                "success"
            );


            window.history.replaceState(
                {},
                document.title,
                url.pathname +
                url.search
            );

        }


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