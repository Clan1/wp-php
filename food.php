<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mpdp_form_submit'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'table3';

    $data = [
        'image1' => sanitize_text_field($_POST['image1']),
        'image2' => sanitize_text_field($_POST['image2']),
        'image3' => sanitize_text_field($_POST['image3']),
        'image4' => sanitize_text_field($_POST['image4']),
        'image5' => sanitize_text_field($_POST['image5']),
        'text1' => sanitize_textarea_field($_POST['text1']),
        'text2' => sanitize_textarea_field($_POST['text2']),
        'text3' => sanitize_textarea_field($_POST['text3']),
        'text4' => sanitize_textarea_field($_POST['text4']),
        'text5' => sanitize_textarea_field($_POST['text5']),
        'dropdown' => sanitize_text_field($_POST['dropdown']),
        'checkbox' => isset($_POST['checkbox']) ? 1 : 0,
        'url' => esc_url($_POST['url']),
    ];

    $wpdb->insert($table_name, $data);
    echo '<div class="updated"><p>Data inserted successfully</p></div>';
}
?>

<div class="wrap">
    <h1>Pagina inserimento Ristoranti, pub, bar e simili</h1>
    <form method="post" action="">
        <table class="form-table">
            <tr>
                <th scope="row"><label for="image1">Image 1</label></th>
                <td><input type="text" name="image1" id="image1" class="regular-text"><button class="upload_image_button button">Upload Image</button></td>
            </tr>
            <tr>
                <th scope="row"><label for="image2">Image 2</label></th>
                <td><input type="text" name="image2" id="image2" class="regular-text"><button class="upload_image_button button">Upload Image</button></td>
            </tr>
            <tr>
                <th scope="row"><label for="image3">Image 3</label></th>
                <td><input type="text" name="image3" id="image3" class="regular-text"><button class="upload_image_button button">Upload Image</button></td>
            </tr>
            <tr>
                <th scope="row"><label for="image4">Image 4</label></th>
                <td><input type="text" name="image4" id="image4" class="regular-text"><button class="upload_image_button button">Upload Image</button></td>
            </tr>
            <tr>
                <th scope="row"><label for="image5">Image 5</label></th>
                <td><input type="text" name="image5" id="image5" class="regular-text"><button class="upload_image_button button">Upload Image</button></td>
            </tr>
            <tr>
                <th scope="row"><label for="text1">Text 1</label></th>
                <td><textarea name="text1" id="text1" class="large-text"></textarea></td>
            </tr>
            <tr>
                <th scope="row"><label for="text2">Text 2</label></th>
                <td><textarea name="text2" id="text2" class="large-text"></textarea></td>
            </tr>
            <tr>
                <th scope="row"><label for="text3">Text 3</label></th>
                <td><textarea name="text3" id="text3" class="large-text"></textarea></td>
            </tr>
            <tr>
                <th scope="row"><label for="text4">Text 4</label></th>
                <td><textarea name="text4" id="text4" class="large-text"></textarea></td>
            </tr>
            <tr>
                <th scope="row"><label for="text5">Text 5</label></th>
                <td><textarea name="text5" id="text5" class="large-text"></textarea></td>
            </tr>
            <tr>
                <th scope="row"><label for="dropdown">Dropdown</label></th>
                <td>
                    <select name="dropdown" id="dropdown">
                           <option value="Ristorante">Fasano</option>
                            <option value="Pizzeria">Cisternino</option>
                            <option value="Pub">Ceglie Messapica</option> 
                            <option value="Tavola calda">Carvigno</option>
                            <option value="Bar">Martina Franca</option>
                            <option value="">Locorotondo</option>
                            <option value="Alberobello">Alberobello</option>
                            <option value="Castellana">Castellana Grotte</option>
                            <option value="Lecce">Lecce</option>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="checkbox">Checkbox</label></th>
                <td><input type="checkbox" name="checkbox" id="checkbox"></td>
            </tr>
            <tr>
                <th scope="row"><label for="url">URL</label></th>
                <td><input type="url" name="url" id="url" class="regular-text"></td>
            </tr>
        </table>
        <p class="submit"><input type="submit" name="mpdp_form_submit" class="button-primary" value="Save Data"></p>
    </form>
</div>
