<div id="divManageTunes" ?>
    
    <hr>
    <h3> Tune Info:</h3>
    <form action="../wp-content/plugins/TerrificTunes/InsertAlbum.php" method="post">
        <div>
            <h3> Album Name:</h3>
            <input type='text' name='Name'>
            <input type="submit" value="Insert New Album">
        </div>
    </form>
    <hr>
    <form action="../wp-content/plugins/TerrificTunes/InsertTrack.php" method="post">
        <div>
            <h3> Track Name:</h3>
            <input type='text' name='Name'>
            <h3> Artist Name:</h3>
            <input type='text' name='Artist'>
            <input type="submit" value="Insert New Track">
        </div>
    </form>
    <hr>
    <form action="../wp-content/plugins/TerrificTunes/DeleteAlbum.php" method="post">
        <h3> Delete Album by ID</h3>
        <input type='text' name='id'>
        <input type="submit" value="Delete Album">
    </form>
    <hr>
    <form action="../wp-content/plugins/TerrificTunes/DeleteTrack.php" method="post">
        <h3> Delete Track by ID</h3>
        <input type='text' name='id'>
        <input type="submit" value="Delete Track">
    </form>
    <hr>
    <form action="../wp-content/plugins/TerrificTunes/UpdateAlbum.php" method="post">
        <h3> Update Album by ID</h3>
        id: <input type='text' name='id'>
        name:<input type='text' name='name'>
        <input type="submit" value="Update Album">
    </form>
    <hr>
    <form action="../wp-content/plugins/TerrificTunes/UpdateTrack.php" method="post">
        <h3> Update Track by ID</h3>
        id: <input type='text' name='id'>
        name: <input type='text' name='name'>
        artist: <input type='text' name='artist'>
        <input type="submit" value="Update Track">
    </form>
    <hr>
</div>