<?php
require_once(FORM_SUBMITS_PATH . "/includes/get-database-records.php");

function add_admin_menu_page()
{
    add_menu_page(
        "Üzenetek",
        "Üzenetek",
        "manage_options",
        "form-submits",
        "createAdminPage",
        "dashicons-email-alt",
        25
    );
}
add_action("admin_menu", "add_admin_menu_page");

function createHeader()
{
    $header = "<h1>Beérkezett üzenetek</h1>";
    return $header;
}

function createFilterSection()
{
    $filterSection = "<div class='filter-section__wrapper'>";
    $filterSection .= "<h2>Szűrés a beérkezett üzenetek között</h2>";

    $filterSection .= "<form class='js-filter-form'>";

    // Name
    $filterSection .= "<div class='form-group'>";
    $filterSection .= "<label for='submit-min'>Név</label>";
    $filterSection .= "<input type='text' name='name' id='name'>";
    $filterSection .= "</div>";

    // Company name
    $filterSection .= "<div class='form-group'>";
    $filterSection .= "<label for='company_name'>Cégnév</label>";
    $filterSection .= "<input type='text' name='company_name' id='company_name'>";
    $filterSection .= "</div>";

    // E-mail address
    $filterSection .= "<div class='form-group'>";
    $filterSection .= "<label for='email'>E-mail cím</label>";
    $filterSection .= "<input type='email' name='email' id='email'>";
    $filterSection .= "</div>";

    // Phone number
    $filterSection .= "<div class='form-group'>";
    $filterSection .= "<label for='phone'>Telefonszám</label>";
    $filterSection .= "<input type='text' name='phone' id='phone'>";
    $filterSection .= "</div>";

    // Message content
    $filterSection .= "<div class='form-group'>";
    $filterSection .= "<label for='message'>Üzenet tartalma</label>";
    $filterSection .= "<input type='text' name='message' id='message'>";
    $filterSection .= "</div>";

    // CV
    $filterSection .= "<div class='form-group'>";
    $filterSection .= "<label for='cv'>CV</label>";
    $filterSection .= "<input type='checkbox' name='cv' id='cv'>";
    $filterSection .= "</div>";

    // Submit button
    $filterSection .= "<button type='submit' class='js-submit-filter'>Szűrés</button>";

    $filterSection .= "</form>";

    // Button wrapper for other actions
    $filterSection .= "<div class='buttons__wrapper'>";
    $filterSection .= "<button type='button' class='js-delete-records delete-records'>Összes üzenet törlése</button>";
    $filterSection .= "<button type='button' class='js-export-records export-records'>Megjelenített üzenetek exportálása</button>";
    $filterSection .= "</div>";

    $filterSection .= "</div>";

    return $filterSection;
}

function createDataTableInner($dbRecords)
{

    $tableInner = "<table><thead><tr>";
    $tableInner .= "<th>Beküldés ideje</th>";
    $tableInner .= "<th>Név</th>";
    $tableInner .= "<th>Cégnév</th>";
    $tableInner .= "<th>E-mail cím</th>";
    $tableInner .= "<th>Telefonszám</th>";
    $tableInner .= "<th>Üzenet</th>";
    $tableInner .= "<th>CV</th>";
    $tableInner .= "<th>GDPR</th>";
    $tableInner .= "</tr></thead><tbody>";

    foreach ($dbRecords as $record) {
        $tableInner .= "<tr>";

        $submitTime  = $record->submit_time;
        $name        = $record->name;
        $companyName = $record->company_name;
        $email       = $record->email;
        $phone       = $record->phone;
        $message     = $record->message;
        $cv          = $record->cv;
        $gdpr        = $record->gdpr;

        $tableInner .= "<td>$submitTime</td>";
        $tableInner .= "<td>$name</td>";
        $tableInner .= "<td>$companyName</td>";
        $tableInner .= "<td>$email</td>";
        $tableInner .= "<td>$phone</td>";
        $tableInner .= "<td>$message</td>";
        $tableInner .= "<td>$cv</td>";
        $tableInner .= "<td>$gdpr</td>";

        $tableInner .= "</tr>";
    }

    $tableInner .= "</tbody></table>";
    $tableInner .= "</div>";
    return $tableInner;
}

function createDataTable()
{
    $dbRecords = getDatabaseRecords();
    $tableInner = createDataTableInner($dbRecords);

    $table = "<div class='js-data-table-wrapper'>";
    $table .= $tableInner;
    $table .= "</div>";

    return $table;
}

function createAdminPage()
{
    $header = createHeader();
    $filter = createFilterSection();
    $table = createDataTable();

    echo $header;
    echo $filter;
    echo $table;
}
