<!--form phon-->
            <div class="form-quest">
                <div class="row ">
                    <div class="col-sm-5 col-xs-12">
                        <h3>У Вас есть вопросы по ремонту оборудования?</h3>
                        <p>Мы перезвоним в течение 30 секунд</p>
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <form>
                            <input type="hidden" name="_token_callback2" value="{{ csrf_token() }}" />
                            <div class="row">
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <input type="phone" class="form-control" id="callback2-phone" placeholder="Телефон">
                                    </div>
                                </div>
                                <div class="col-xs-5"> <a type="submit" class="btn font-cond" id="callback2-send">Отправить</a> </div>
                            </div>
                        </form>
                        <div class="phon-form">или позвоните по номеру <span>+7 (905) 176-85-16</span></div>
                        <p class="police">Нажимая кнопку <i>«Отправить»</i>, вы автоматически выражаете согласие на обработку своих персональных данных  и принимаете условия <a href="/politic"><nobr>Пользовательского соглашения</nobr></a>.</p>
                    </div>
                </div>
            </div>
<!--//form phon--> 