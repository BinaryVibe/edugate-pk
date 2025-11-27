document.addEventListener('DOMContentLoaded', function() {
    let dCount = 0, pCount = 0;
    
    document.getElementById('add-deadline-btn').addEventListener('click', function() {
        const html = `
            <div class="border p-3 rounded mb-3 bg-white position-relative" id="d-row-${dCount}">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="document.getElementById('d-row-${dCount}').remove()"></button>
                <input type="text" name="deadlines[${dCount}][title]" class="form-control mb-2" placeholder="Title (e.g. Fall 2025)" required>
                <div class="row g-2">
                    <div class="col-4"><input type="date" name="deadlines[${dCount}][start_date]" class="form-control" required></div>
                    <div class="col-4"><input type="date" name="deadlines[${dCount}][end_date]" class="form-control" required></div>
                    <div class="col-4">
                        <select name="deadlines[${dCount}][status]" class="form-control">
                            <option value="Open">Open</option><option value="Upcoming">Upcoming</option><option value="Closed">Closed</option>
                        </select>
                    </div>
                </div>
            </div>`;
        document.getElementById('deadlines-container').insertAdjacentHTML('beforeend', html);
        dCount++;
    });

    document.getElementById('add-program-btn').addEventListener('click', function() {
        const html = `
            <div class="border p-3 rounded mb-3 bg-white position-relative" id="p-row-${pCount}">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="document.getElementById('p-row-${pCount}').remove()"></button>
                <input type="text" name="programs[${pCount}][name]" class="form-control mb-2" placeholder="Program Name" required>
                <input type="text" name="programs[${pCount}][criteria]" class="form-control" placeholder="Eligibility Criteria">
            </div>`;
        document.getElementById('programs-container').insertAdjacentHTML('beforeend', html);
        pCount++;
    });
});