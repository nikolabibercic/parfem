<?php
    class Setting extends ConnectionBuilder{

        public $orderInserted = null;
        public $settingUpdated = null;

        public function selectSettingValue($settingId){
            $sql = "
                select s.setting_value,s.setting_value_2
                from settings s
                where s.setting_id = {$settingId}
            ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function navbar($text){
            $navbarJumbotronColor = $this->selectSettingValue(2);
            $navbarJumbotronTextColor = $this->selectSettingValue(4);
            echo '<div class="jumbotron jumbotron-fluid" style="background-color:'.$navbarJumbotronColor[0]->setting_value.'; color:'.$navbarJumbotronTextColor[0]->setting_value.' " >';
                echo '<div class="container text-center" > ';
                    echo '<h1 class="display-4">'.$text.'</h1>';
                echo '</div>';
            echo '</div>';
        }

        public function selectAllSettings(){
            $sql = "
                select *
                from settings
                order by setting_description
            ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function updateSetting($settingId,$settingValue,$settingValue2){
            $sql = "
                    update settings set setting_value = '{$settingValue}', setting_value_2 = '{$settingValue2}' where setting_id = {$settingId};
                    ";
            $query = $this->conn->prepare($sql);
            $checkUpdate = $query->execute();

            if($checkUpdate){
                $this->settingUpdated = true;
            }else{
                $this->settingUpdated = false;
            }
        }
    }
?>