<?php
    class Setting extends ConnectionBuilder{

        public $orderInserted = null;

        public function selectSettingValue($settingId){
            $sql = "
                select s.setting_value 
                from settings s
                where s.setting_id = {$settingId}
            ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        }

        public function navbar($text){
            $navbarJumbotronColor = $this->selectSettingValue(2);
            $navbarJumbotronTextColor = $this->selectSettingValue(4);
            echo '<div class="jumbotron jumbotron-fluid" style="background-color:'.$navbarJumbotronColor->setting_value.'; color:'.$navbarJumbotronTextColor->setting_value.' " >';
                echo '<div class="container text-center" > ';
                    echo '<h1 class="display-4">'.$text.'</h1>';
                echo '</div>';
            echo '</div>';
        }
    }
?>