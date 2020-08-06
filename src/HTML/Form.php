<?php

namespace App\HTML;

use DateTime;

class Form
{    
    private $data;
    private $errors;

    public function __construct($data, array $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    /**
     * input : Génére un formulaire(Text ou Password)
     *
     * @param  string $key
     * @param  string $label
     * @return string
     */
    public function input(string $key, string $label): string
    {
        /*$value = $this->getValue($key);*/
        $type = $key === "password" ? "password" : "text";
        return <<<HTML
            <div class="form-group">
                <label for="fields{$key}">{$label}</label>
                    <input type="{$type}" id="field{$key}" class ="{$this->getInputClass($key)}" name = "{$key}" value ="{$key}" required>
                    {$this->getErrorFeedBack($key)};
            </div>
HTML;
    }
    
    /**
     * getValue : Permet de vérifier si plusieurs paramétres sont envoyés lors de l'appel à l'objet et si oui de renvoyer les paramétres sous forme de tableau
     *            Modification à la volée de $this->data afin que ca puisse retourner soit getUsername(), soit get Password(), etc... suivant la clé envoyée en paramétre
     *            Je supprime aussi les "_" et je mets les premières lettres en MAJ de $key
     *            Si $value est une date, je la formate afin qu'elle soit compatible avec SQL, sinon, je renvoi $value
     * @param  string $key
     * @return string
     */
    private function getValue(string $key): ?string
    {
        if(is_array($key)){
            return $this->data[$key] ?? NULL;
        }

        $method = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        $value = $this->data->$method();

        if($value instanceof DateTime){
            return $value->format('Y-m-d H:i:s');
        }
        return $value;
    }

    private function getInputClass(string $key): string
    {
        $inputClass = 'form-control';
        if(isset($this->errors[$key])){
            $inputClass .= ' is-invalid';
        }
        return $inputClass;
    }

    private function getErrorFeedback (string $key): string
    {
        if(isset($this->errors[$key])){
            if(is_array($this->errors[$key])){
                $errors = implode('<br>', $this->errors[$key]);
            } else {
                $errors = $this->errors[$key];
            }
            return '<div class="invalid-feedback">' . $this->errors[$key] .  '</div>';
        }
        return '';
    }


}