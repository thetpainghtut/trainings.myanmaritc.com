$(function(){
        $('.J-datepicker-time').datePicker({
          format: 'HH:mm:ss',
          min: '04:23:11',
          language: 'en'
        });
        $('.J-datepicker-time-range').datePicker({
          format: 'HH:mm',
          isRange: true,
          language: 'en'
        });

        var DATAPICKERAPI = {
          activeMonthRange: function () {
            return {
              begin: moment().set({ 'date': 1, 'hour': 0, 'minute': 0, 'second': 0 }).format('YYYY-MM-DD HH:mm:ss'),
              end: moment().set({ 'hour': 23, 'minute': 59, 'second': 59 }).format('YYYY-MM-DD HH:mm:ss')
            }
          },
          shortcutMonth: function () {
            var nowDay = moment().get('date');
            var prevMonthFirstDay = moment().subtract(1, 'months').set({ 'date': 1 });
            var prevMonthDay = moment().diff(prevMonthFirstDay, 'days');
            return {
              now: '-' + nowDay + ',0',
              prev: '-' + prevMonthDay + ',-' + nowDay
            }
          },
          shortcutPrevHours: function (hour) {
            var nowDay = moment().get('date');
            var prevHours = moment().subtract(hour, 'hours');
            var prevDate=prevHours.get('date')- nowDay;
            var nowTime=moment().format('HH:mm:ss');
            var prevTime = prevHours.format('HH:mm:ss');
            return {
              day: prevDate + ',0',
              time: prevTime+',' + nowTime,
              name: 'Nearly '+ hour+' Hours'
            }
          },
          rangeMonthShortcutOption1: function () {
            var result = DATAPICKERAPI.shortcutMonth();
            var resultTime= DATAPICKERAPI.shortcutPrevHours(18);
            return [{
              name: 'Yesterday',
              day: '-1,-1',
              time: '00:00:00,23:59:59'
            }, {
              name: 'This Month',
              day: result.now,
              time: '00:00:00,'
            }, {
              name: 'Lasy Month',
              day: result.prev,
              time: '00:00:00,23:59:59'
            }, {
              name: resultTime.name,
              day: resultTime.day,
              time: resultTime.time
            }];
          },
          rangeShortcutOption1: [{
            name: 'Last week',
            day: '-7,0'
          }, {
            name: 'Last Month',
            day: '-30,0'
          }, {
            name: 'Last Three Months',
            day: '-90, 0'
          }],
          singleShortcutOptions1: [{
            name: 'Today',
            day: '0',
            time: '00:00:00'
          }, {
            name: 'Yesterday',
            day: '-1',
            time: '00:00:00'
          }, {
            name: 'One Week Ago',
            day: '-7'
          }]
        };
          $('.J-datepicker').datePicker({
            hasShortcut:true,
            language: 'en',

            hide:function(){
              console.info(this)
            }
          });


          $('.J-datepicker-day').datePicker({
            // hasShortcut: true,
            language: 'en',
            // shortcutOptions: [{
            //   name: 'Today',
            //   day: '0'
            // }, {
            //   name: 'Yesterday',
            //   day: '-1'
            // }, {
            //   name: 'One week ago',
            //   day: '-7'
            // }]
            format:'YYYY-MM-DD'
          });


          $('.J-datepicker-range-day').datePicker({
            // hasShortcut: true,
            language: 'en',
            format: 'YYYY-MM-DD',
            isRange: true,
            // shortcutOptions: DATAPICKERAPI.rangeShortcutOption1
          });


          $('.J-datepickerTime-single').datePicker({
            format: 'YYYY-MM-DD HH:mm',
            language: 'en',
          });


          $('.J-datepickerTime-range').datePicker({
            format: 'YYYY-MM-DD HH:mm',
            isRange: true,
            language: 'en'
          });


          $('.J-datepicker-range').datePicker({
            // hasShortcut: true,
            language: 'en',
            isRange: true,
            
          });
          $('.J-datepicker-range-betweenMonth').datePicker({
            isRange: true,
            between:'month',
            language: 'en',
            hasShortcut: true,
            shortcutOptions: DATAPICKERAPI.rangeMonthShortcutOption1()
          });


          $('.J-datepicker-range-between30').datePicker({
            isRange: true,
            language: 'en',
            between: 30
          });

          $('.J-yearMonthPicker-single').datePicker({
            format: 'YYYY-MM',
            language: 'en',
            min: '2018-01',
            max: '2029-04',
            hide: function (type) {
              console.info(this.$input.eq(0).val());
            }
          });

          $('.J-yearPicker-single').datePicker({
            format: 'YYYY',
            language: 'en',
            min: '2018',
            max: '2029'
          });


      });