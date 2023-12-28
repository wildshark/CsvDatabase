<?php
class CsvDatabase
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    private function loadData()
    {
        if (!file_exists($this->filename)) {
            return [];
        }

        $data = [];
        $file = fopen($this->filename, 'r');

        // Read the header row
        $header = fgetcsv($file);

        while ($row = fgetcsv($file)) {
            $data[] = array_combine($header, $row);
        }

        fclose($file);

        return $data;
    }

    private function saveData($data)
    {
        $file = fopen($this->filename, 'w');

        if (!empty($data)) {
            // Write the header row
            fputcsv($file, array_keys($data[0]));

            // Write the data rows
            foreach ($data as $row) {
                fputcsv($file, $row);
            }
        }

        fclose($file);
    }

    public function getAll()
    {
        return $this->loadData();
    }

    public function getById($id)
    {
        $data = $this->loadData();

        foreach ($data as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }

        return null;
    }

    public function create($item)
    {
        $data = $this->loadData();

        $item['id'] = uniqid(); // Generate a unique ID (you may want to use a more robust method)

        $data[] = $item;

        $this->saveData($data);

        return $item;
    }

    public function update($id, $updatedItem)
    {
        $data = $this->loadData();

        foreach ($data as &$item) {
            if ($item['id'] == $id) {
                $item = array_merge($item, $updatedItem);
                $this->saveData($data);
                return $item;
            }
        }

        return null;
    }

    public function delete($id)
    {
        $data = $this->loadData();

        foreach ($data as $key => $item) {
            if ($item['id'] == $id) {
                unset($data[$key]);
                $this->saveData($data);
                return $item;
            }
        }

        return null;
    }
}

?>
