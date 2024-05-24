<x-filament-panels::page>

    <div class="bg-white p-8 border-1 border rounded-2xl">
        <ol class="px-8 list-decimal">
            <li class="text-2xl font-bold pb-4"> Erstellen eines Shortlinks</li>

            <p>Um einen Shortlink zu erstellen, werden folgende Angaben benötigt:</p>
            <ul class="list-disc pl-8">
                <li>Die Ziel-URL, zu der der Shortlink führen soll.</li>
                <li>Ein eindeutiger Kurzlink-Identifier, der nur aus Buchstaben und Zahlen bestehen darf.</li>
                <li>Die Zuordnung zu einem Kunden, der im Dropdown-Menü ausgewählt werden muss.</li>
                <p class="mt-2 text-xs"><b>Bitte beachte:</b> Falls der Kunde im Dropdown-Menü nicht zur Auswahl steht,
                    muss dieser zuerst <a
                        class="underline"
                        href="/admin/customers">hier</a> angelegt werden.</p>
            </ul>
            <li class="text-2xl font-bold pt-12 pb-4">Bearbeiten eines Short Links</li>
            <p><span>Alle Eingaben eines Eintrags können nachträglich verändert werden.</span></p>
            <p>In einigen Fällen ist es allerdings sinnvoller einen neuen Link zu erstellen.</p>
            <li class="text-2xl font-bold pt-12 pb-4">Analyse Parameter</li>
            <p>Analyse-Parameter ermöglichen es, Klicks und andere Metriken für die Shortlinks zu verfolgen.<br>
                Du kannst beispielsweise UTM-Parameter für Google Analytics hinzufügen oder andere Parameter über die
                individuelle Freitexteingabe, um den Traffic zu verfolgen.</p>
            <ul class="">
                <li class="text-xl font-bold pt-4 pb-2"> a) Google Analytics</li>
                <p><b>Mindestanforderungen</b> an einen Link, der von Google Analytics ausgewertet werden kann, sind die Website-URL, Kampagnenquelle und Kampagnenmedium.
                </p>
                <ul class="list-disc pl-8 pt-4">
                    <li>Kampagnenquelle (utm_source)</li>
                    <li>Kampagnenmedium (utm_medium)</li>
                </ul>
                <table class=" table my-6">
                    <thead class="table-header-group p-8 ">
                    <tr class="bg-gray-200 text-center">
                        <th class="py-4 px-8">Parameter Name</th>
                        <th class="py-4 px-8">Parameter</th>
                        <th class="py-4 px-8">Erforderlich</th>
                        <th class="py-4 px-8">Beispiel</th>
                        <th class="py-4 px-8 whitespace-normal">Beschreibung</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center border-b">
                        <td class="p-4">Campaign Source</td>
                        <td>utm_source</td>
                        <td class="text-center">JA</td>
                        <td>google</td>
                        <td>Verwende utm_source, um eine Suchmaschine, den Namen eines Newsletters oder eine andere
                            Quelle zu identifizieren.
                        </td>
                    </tr>
                    <tr class="text-center border-b">
                        <td class="p-4">Campaign Medium</td>
                        <td>utm_medium</td>
                        <td class="text-center">JA</td>
                        <td>cpc</td>
                        <td>Verwende utm_medium um ein Medium wie E-Mail oder Kosten pro Klick zu identifizieren.</td>
                    </tr>
                    <tr class="text-center border-b">
                        <td class="p-4">Campaign ID</td>
                        <td>utm_id</td>
                        <td class="text-center">NEIN</td>
                        <td>abc.123</td>
                        <td class="">Verwende utm_id, um zu identifizieren, auf welche Anzeigenkampagne sich diese Empfehlung
                            bezieht.
                        </td>
                    </tr>
                    <tr class="text-center border-b">
                        <td class="p-4">Campaign Name</td>
                        <td>utm_campaign</td>
                        <td class="text-center">NEIN</td>
                        <td>spring_sale</td>
                        <td>Wird für die Keyword-Analyse verwendet. Verwende utm_campaign, um eine spezifische
                            Produktaktion oder eine strategische Kampagne zu identifizieren.
                        </td>
                    </tr>
                    <tr class="text-center border-b">
                        <td class="p-4">Campaign Term</td>
                        <td>utm_term</td>
                        <td class="text-center">NEIN</td>
                        <td>running+shoes</td>
                        <td>Wird für bezahlte Suche verwendet. Verwenden Sie utm_term, um die Keywords für diese Anzeige
                            zu vermerken.
                        </td>
                    </tr>
                    <tr class="text-center border-b">
                        <td class="p-4">Campaign Content</td>
                        <td>utm_content</td>
                        <td class="text-center">NEIN</td>
                        <td>logolink</td>
                        <td>Wird für A/B-Tests und werbliche Inhalte verwendet. Verwenden Sie utm_content, um Anzeigen
                            oder Links zu unterscheiden, die auf dieselbe URL verweisen.
                        </td>
                    </tr>

                    </tbody>
                </table>
                <p>weitere Informationen zu den aktuellen GA4 Richtlinien findest du <a class="underline"
                                                                                        href="https://ga-dev-tools.google/ga4/campaign-url-builder/">hier</a>.
                </p>
                <li class="text-xl font-bold pt-4 pb-2">b) Individuelle Parameter</li>
                <p>Die Freitexteingabe wird unbearbeitet als Parameter
                    gespeichert und bei der Weiterleitung mit einem führenden "?" an die Ziel-URL angehangen. </p>
            </ul>
            <li class="text-2xl font-bold pt-12 pb-4">Gültigkeit & Fallback</li>
            <p class="pb-12">Unter dem Reiter <b>Gültigkeit</b> kannst du den Gültigkeitszeitraum eines Kurzlinks bei
                der Erstellung/Bearbeitung einschränken:<br>
                Wird keine Angabe gemacht, ist die Weiterleitung direkt aktiv.</p>
            <p>Als <b>Fallback</b> kannst du eine URL angeben, die aufgerufen wird, wenn der Kurzlink nicht aktiv ist.
                <br>
                Unabhängig davon, ob der Gültigkeitszeitraum noch nicht begonnen hat oder bereits vorbei ist. </p>
        </ol>


    </div>


</x-filament-panels::page>
