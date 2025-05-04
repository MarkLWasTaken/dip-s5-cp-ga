<style>
.container-3-contents-2-container {
    /*
    A hidden container to ensure the contents tabs animations (if any)
    do not push the footer down and affect the overall website design.
    */
    display: flex;
    justify-content: center;
    gap: 75px;
    height: 50px;
    /* margin-right: 25%; */
}

.container-3-contents-2-shared {
    height: 60px;
    width: 15%;
    border-style: solid;
    border-radius: 20px;
    float: left;
    margin-left: 5px;
    margin-right: 5px;
    border-width: 4px;
    text-align: center;
    font-weight: bold;
    background: linear-gradient(rgb(95, 120, 120), rgba(27, 47, 48, 0.7));

    -webkit-transition: background-color 0.3s, transform 0.3s linear; /* Safari, Chrome and Opera > 12.1 */
	-moz-transition: background-color 0.3s, transform 0.3s linear; /* Firefox < 16 */
	-ms-transition: background-color 0.3s, transform 0.3s linear; /* Internet Explorer */
	-o-transition: background-color 0.3s, transform 0.3s linear; /* Opera < 12.1 */
    transition: background-color 0.3s, transform 0.3s linear;
}

.container-3-contents-2-shared:hover {
    transform: scale(1.15);

    -webkit-transition: background-color 0.3s, transform 0.3s linear; /* Safari, Chrome and Opera > 12.1 */
	-moz-transition: background-color 0.3s, transform 0.3s linear; /* Firefox < 16 */
	-ms-transition: background-color 0.3s, transform 0.3s linear; /* Internet Explorer */
	-o-transition: background-color 0.3s, transform 0.3s linear; /* Opera < 12.1 */
    transition: background-color 0.3s, transform 0.3s linear;
}

.container-3-contents-2-approve {
    border-color: lightseagreen;
    color: lightseagreen;
	text-decoration: none;  /* Disable hyperlink decoration */
}

.container-3-contents-2-approve:hover {
    background: darkgreen;

    -webkit-transition: background-color 0.3s, transform 0.3s linear; /* Safari, Chrome and Opera > 12.1 */
	-moz-transition: background-color 0.3s, transform 0.3s linear; /* Firefox < 16 */
	-ms-transition: background-color 0.3s, transform 0.3s linear; /* Internet Explorer */
	-o-transition: background-color 0.3s, transform 0.3s linear; /* Opera < 12.1 */
    transition: background-color 0.3s, transform 0.3s linear;
}

.no-decoration-button {
    border: none;
    background: none;
    padding: 0;
    margin: 0;
    outline: none;
    cursor: pointer;
    margin-top: auto;
    margin-bottom: auto;
    width: 100%;
    height: 100%;
    border-radius: 20px;
    font-weight: bold;
}
</style>

<div class="container-3-contents-2-container">
    <form id="approve" method="post" action="../../admin/e-waste-requests/approve.php" class="container-3-contents-2-shared container-3-contents-2-approve">
        <input type="hidden" name="request_id" value="<?php echo $request_id; ?>">
        <input type="submit" name="submit" value="Approve" class="container-3-contents-2-approve no-decoration-button">
    </form>
</div>





<style>
.container-7 {
    /*
    A hidden container to ensure the contents tabs animations (if any)
    do not push the footer down and affect the overall website design.
    */
    display: flex;
    justify-content: center;
    gap: 75px;
    height: 50px;
    /* margin-right: 25%; */
}

.container-7-content {
    height: 60px;
    width: 15%;
    border-style: solid;
    border-radius: 20px;
    float: left;
    margin-left: 5px;
    margin-right: 5px;
    border-width: 4px;
    text-align: center;
    font-weight: bold;
    background: linear-gradient(rgb(95, 120, 120), rgba(27, 47, 48, 0.7));

    -webkit-transition: background-color 0.3s, transform 0.3s linear; /* Safari, Chrome and Opera > 12.1 */
	-moz-transition: background-color 0.3s, transform 0.3s linear; /* Firefox < 16 */
	-ms-transition: background-color 0.3s, transform 0.3s linear; /* Internet Explorer */
	-o-transition: background-color 0.3s, transform 0.3s linear; /* Opera < 12.1 */
    transition: background-color 0.3s, transform 0.3s linear;
}

.container-7-content:hover {
    transform: scale(1.15);

    -webkit-transition: background-color 0.3s, transform 0.3s linear; /* Safari, Chrome and Opera > 12.1 */
	-moz-transition: background-color 0.3s, transform 0.3s linear; /* Firefox < 16 */
	-ms-transition: background-color 0.3s, transform 0.3s linear; /* Internet Explorer */
	-o-transition: background-color 0.3s, transform 0.3s linear; /* Opera < 12.1 */
    transition: background-color 0.3s, transform 0.3s linear;
}

.container-7-content-edit {
    border-color: lightseagreen;
    color: lightseagreen;
	text-decoration: none;  /* Disable hyperlink decoration */
}

.container-7-content-edit:hover {
    background: darkgreen;

    -webkit-transition: background-color 0.3s, transform 0.3s linear; /* Safari, Chrome and Opera > 12.1 */
	-moz-transition: background-color 0.3s, transform 0.3s linear; /* Firefox < 16 */
	-ms-transition: background-color 0.3s, transform 0.3s linear; /* Internet Explorer */
	-o-transition: background-color 0.3s, transform 0.3s linear; /* Opera < 12.1 */
    transition: background-color 0.3s, transform 0.3s linear;
}

.no-decoration-button {
    border: none;
    background: none;
    padding: 0;
    margin: 0;
    outline: none;
    cursor: pointer;
    margin-top: auto;
    margin-bottom: auto;
    width: 100%;
    height: 100%;
    border-radius: 20px;
    font-weight: bold;
}
</style>

                        <div class="container-7">
                            <form id="approve" method="post" action="../../admin/e-waste-requests/approve.php" class="container-7-content container-7-content-edit">
                                <input type="hidden" name="request_id" value="<?php echo $request_id; ?>">
                                <input type="submit" name="submit" value="Approve" class="container-7-content-edit no-decoration-button">
                            </form>
                        </div>
