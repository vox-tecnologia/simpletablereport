<?php

/*
 * Copyright 2013 kelsoncm <falecom@kelsoncm.com>.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Umbrella\SimpleReport\Fields\Xlsx;

use Umbrella\SimpleReport\Fields\DecimalType;

/**
 * Description of MoneyType
 *
 * @author kelsoncm <falecom@kelsoncm.com>
 */
class XlsxMoneyType extends DecimalType
{

    public function format($value)
    {
        $value = parent::format($value);
        return empty($value) ? null : "<c r=\"cellAddress\" s=\"2\"><v>{$value}</v></c>";
    }
}
