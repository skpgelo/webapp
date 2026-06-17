<!DOCTYPE html>
<html lang="id">
<head>
    <title>Organization Chart</title>
    <script src="https://balkangraph.com"></script>
</head>
<body>

    <div id="tree" style="width: 100%; height: 800px;"></div>

    <script>
        // Mengubah data PHP ke JavaScript
        const rawData = <?= json_encode($sdm); ?>;
        
        // Memformat data agar sesuai dengan OrgChart JS
        const chartData = rawData.map(item => ({
            id: item.id,
            pid: item.parent_id === null ? null : item.parent_id,
            name: item.nama,
            title: item.jabatan
        }));

        // Render Chart
        const chart = new OrgChart(document.getElementById("tree"), {
            nodes: chartData,
            nodeBinding: {
                field_0: "name",
                field_1: "title"
            }
        });
    </script>
</body>
</html>
