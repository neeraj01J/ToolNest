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