<?php
public function renderView(string $name, $params = []) {
        //combine _app and [view].php
        $viewContent = $this->getView($name, $params);
        $layoutContent = $this->getView('_app', $params);
        $temp = str_replace('{{content}}', $viewContent, $layoutContent);

        $components = scandir(Application::$ROOT.'views/components');
        // Support nested components
        // if you want structure like Index->Main->Card->Link
        // It is best to do ..Main, .Card and Link :)
        // IDK WHY _____ doesnt work ??? 
        sort($components, SORT_STRING);
        foreach($components as $componentName) {
            if($componentName === '.' || $componentName === '..') continue;
            // needle = {{Name}}
            // -4 = .php
            $needle = '{{'.substr($componentName, 0, strlen($componentName)-4).'}}';
            $lastPos = 0;

            while (($lastPos = strpos($temp, $needle, $lastPos))!== false) {
                // $lastPos = $lastPos + strlen($needle); Components can be nested so we shouldnt add
                $content = $this->getComponent($componentName);
                // replace {{component}} with spaces 
                for($i=$lastPos;$i<$lastPos+strlen($needle);$i++) {
                    $temp[$i] = ' ';
                }
                $temp = substr_replace($temp, $content, $lastPos, 0);
            }
        }
        foreach($params as $key => $value) {
            $temp = str_replace("{{$key}}", $value, $temp);
        }
        return $temp;
    }
    protected function getComponent(string $name) {
        ob_start();
        include Application::$ROOT."views/components/$name";
        return ob_get_clean();
    }