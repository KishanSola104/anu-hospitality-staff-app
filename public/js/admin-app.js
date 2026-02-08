document.addEventListener("DOMContentLoaded", function () {
    /* ======================
       SIDEBAR TOGGLE
    ====================== */
    const toggleBtn = document.getElementById("sidebarToggle");
    const sidebar = document.querySelector(".admin-sidebar");
    const overlay = document.getElementById("sidebarOverlay");

    if (toggleBtn && sidebar && overlay) {
        toggleBtn.addEventListener("click", function () {
            sidebar.classList.toggle("active");
            overlay.classList.toggle("active");
        });

        overlay.addEventListener("click", function () {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
        });
    }

    /* ======================
       DASHBOARD CHARTS
       (ONLY IF DASHBOARD)
    ====================== */
    const dataEl = document.getElementById("dashboard-data");

    if (dataEl) {
        const bookings = Number(dataEl.dataset.bookings);
        const pending = Number(dataEl.dataset.pending);
        const vacancies = Number(dataEl.dataset.vacancies);
        const contacts = Number(dataEl.dataset.contacts);

        const colors = {
            blue: "#0A66C2",
            light: "#78B9FF",
            green: "#22C55E",
            orange: "#F97316",
        };

        new Chart(document.getElementById("barChart"), {
            type: "bar",
            data: {
                labels: ["Total Bookings", "Pending", "Vacancies", "Contacts"],
                datasets: [
                    {
                        data: [bookings, pending, vacancies, contacts],
                        backgroundColor: colors.blue,
                        borderRadius: 8,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } },
            },
        });

        new Chart(document.getElementById("pieChart"), {
            type: "doughnut",
            data: {
                labels: ["Bookings", "Pending", "Vacancies", "Contacts"],
                datasets: [
                    {
                        data: [bookings, pending, vacancies, contacts],
                        backgroundColor: [
                            colors.blue,
                            colors.light,
                            colors.green,
                            colors.orange,
                        ],
                    },
                ],
            },
            options: {
                cutout: "60%",
                responsive: true,
            },
        });
    }
/* ======================
   BOOKING VIEW POPUP
====================== */
document.addEventListener("click", function (e) {

    const viewBtn = e.target.closest("[data-view]");
    const modal   = document.getElementById("bookingModal");

    /* OPEN MODAL */
    if (viewBtn) {
        const b = JSON.parse(viewBtn.dataset.booking);

        const formatDate = d =>
            d ? new Date(d).toLocaleDateString("en-GB", {
                day: "2-digit",
                month: "short",
                year: "numeric"
            }) : "N/A";

        let extras = "None";
        if (b.extras && typeof b.extras === "object") {
            extras = Object.keys(b.extras)
                .filter(k => b.extras[k])
                .map(k => k.charAt(0).toUpperCase() + k.slice(1))
                .join(", ") || "None";
        }

        const materials =
            b.cleaning_materials === "company"
                ? `Company (+ £${b.materials_charge})`
                : "Customer provides";

        document.getElementById("bookingModalBody").innerHTML = `
            <div class="modal-grid">

                <div class="modal-section">
                    <h4>Customer</h4>
                    <p><strong>${b.full_name}</strong></p>
                    <p>${b.mobile}</p>
                </div>

                <div class="modal-section">
                    <h4>Schedule</h4>
                    <p>${formatDate(b.preferred_date)}</p>
                    <p>${b.arrival_window}</p>
                    <p><strong>Hours:</strong> ${b.hours}</p>
                </div>

                <div class="modal-section">
                    <h4>Service</h4>
                    <p>${b.bedrooms} Bed / ${b.bathrooms} Bath</p>
                    <p><strong>Extras:</strong> ${extras}</p>
                    <p><strong>Pets:</strong> ${b.has_pets ? "Yes" : "No"}</p>
                </div>

                <div class="modal-section">
                    <h4>Access & Materials</h4>
                    <p>${b.access_method}</p>
                    <p><strong>Materials:</strong> ${materials}</p>
                </div>

                <div class="modal-section full">
                    <h4>Address</h4>
                    <p>${b.address}</p>
                    <p>${b.city} - ${b.address_postcode}</p>
                </div>

                <div class="modal-section">
                    <h4>Pricing</h4>
                    <p>Base: £${b.base_price}</p>
                    <p>Materials: £${b.materials_charge}</p>
                    <p>Discount: £${b.discount}</p>
                    <p class="modal-total">Total: £${b.total_price}</p>
                </div>

                <div class="modal-section">
                    <h4>Payment</h4>
                    <p><strong>${b.payment_status.toUpperCase()}</strong></p>
                </div>

                <div class="modal-section full">
                    <h4>Instructions</h4>
                    <p>${b.instructions || "No special instructions"}</p>
                </div>

            </div>
        `;

        document.getElementById("downloadPdfBtn").href =
            `/admin/bookings/${b.id}/download`;

        modal.style.display = "flex";
    }

    /* CLOSE MODAL */
    if (
        e.target.id === "closeBookingModal" ||
        e.target.id === "closeBookingModalFooter" ||
        e.target === modal
    ) {
        modal.style.display = "none";
    }
});

});
